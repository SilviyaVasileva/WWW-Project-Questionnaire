<?php
// database connection
require_once('quizDB.php');
// function for getting a test
require_once('test-query.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/show-test.css">
    <link rel="stylesheet" type="text/css" href="../css/navigation.css">
    <title>Document</title>
</head>
<body>
    <?php 
        // $rows is an array with all the questions and answer in the test

        // gets the answers number
        $endIndex = count($rows);
        $testName = "";

        // if $rows is empty shows a message
        if($endIndex == 0) {
            $testName = "No questions in the test.";
        }
        else {
            // get test name and id
            $testName = $rows[0]['testName'];
            $testId = $rows[0]['testId'];

            $questionDescription = "";
            // get the queston id from the session
            $questionIndex = $_SESSION['questionId'];
            $startIndex = 0;
            // goes to the next question
            if(isset($_POST['nextBtn']) && $questionIndex < $endIndex - 4){
                $_SESSION['questionId'] = $questionIndex + 4;
                $questionIndex = $_SESSION['questionId'];
            }
            // goes to the previos question
            if(isset($_POST['prevBtn']) && $questionIndex >= $startIndex + 4){
                $_SESSION['questionId'] = $questionIndex - 4;
                $questionIndex = $_SESSION['questionId'];
            }
            // goes to the menu
            
            // sets the current question and answers
            if($questionIndex >= $startIndex && $questionIndex <= $endIndex - 4) {
                $questionDescription = $rows[$questionIndex]['questionDescription'];
                $questionId = $rows[$questionIndex]['questionId'];
                $answers = array();
                $correct_answer = $rows[$questionIndex]['correctAnswerNumber'];

                for ($i=$questionIndex; $i < $questionIndex + 4; $i++) { 
                    $answers[] = [$rows[$i]['answerDescription'], $rows[$i]['answerNumber']];
                }
            }
            
            // saves userAnswers
            
            $buttonInd = 0;
            if (isset($_POST['answ'])) {
                $_SESSION['userAnswers'][$questionIndex/4] = $_POST['answ'];
                $buttonInd = $_POST['answ'];
            }
            
        }

        // check if the test is finished
        if(isset($_POST['finishBtn'])){

            // do the math.....

            // gets the user answers and saves a test in the user_test table
            $userAnswers = $_SESSION['userAnswers'];

            // the points from the test
            $points = 0;
            $sql = "INSERT INTO `user_test` (userId, solvedTestId) VALUES (?,?)";
                $stmtinsert = $conn->prepare($sql);
                $result = $stmtinsert->execute([$_SESSION['id'], $_SESSION['testId']]);

            $solvedTest = 0;
            $answerTable = array();

            // gets the user_test id
            if ($result) {
                $sql_tests = "SELECT id FROM `user_test` ORDER BY id DESC LIMIT 1";
                $result_tests = $conn->query($sql_tests) or die("failed!");
                while($row_test = $result_tests->fetch(PDO::FETCH_ASSOC)) {
                    $solvedTest = $row_test['id'];
            }
            }

            // add the user answers in the database
            for ($i=0; $i < $endIndex/4; $i++) { 
                $qId = $rows[$i*4]['questionId'];
                $corrAnswer = $rows[$i*4]['correctAnswerNumber'];
                $userAnsw = $userAnswers[$i];
                $answPoints = $rows[$i*4]['points'];
                $userPoints = 0;
                if($corrAnswer == $userAnsw) {
                    $points += $answPoints;
                    $userPoints = $answPoints;
                }
                $answId = 0;

                for ($j=$i*4; $j < $i*4+4; $j++) { 
                    if ($userAnsw == $rows[$j]['answerNumber']) {
                        $answId = $rows[$j]['id'];
                    }
                }

                $answerTable[] = [$answId, $qId, $solvedTest, $answPoints];
                $sql_answ = "INSERT INTO `user_answer` (`answerId`, `questionId`, `userSolvedTestId`, `points`) VALUES (?,?,?,?)";
                $stmtinsert_answ = $conn->prepare($sql_answ);
                $result_answ = $stmtinsert_answ->execute([$answId, $qId, $solvedTest, $userPoints]);
            }

            $_SESSION['points'] = $points;
            header("location:points.php");
        }
    ?>
    <div class="menu-page-ref">
        <?php 
            echo '<nav class="navigation"><ul><li><a href="../php/menu.php?menu">Меню</a></li></ul></nav>';
        ?>
    </div>
    <script type="text/javascript">
        var buttonInd = <?php echo $buttonInd;?>;
        var startIndex = <?php echo $startIndex/4;?>;
        var currIndex = <?php echo $questionIndex/4;?>;
        var endIndex = <?php echo $endIndex/4;?>;
    </script> 
    <script type="text/javascript" src="../js/show-test.js" defer></script>

<div class="wrapper">
    <form method="post">
        <h2><?php echo $testName;?></h2>
        <div class="container">
            <div id="questionContainer">
                <div id="question"><?php echo $questionDescription;?></div>
                <div id="answerBtns" class="btnGrid">
                    <button id="btn1" class="btn" name="answ" value="<?php echo $answers[0][1];?>"><?php echo $answers[0][0];?></button>
                    <button id="btn2" class="btn" name="answ" value="<?php echo $answers[1][1];?>"><?php echo $answers[1][0];?></button>
                    <button id="btn3" class="btn" name="answ" value="<?php echo $answers[2][1];?>"><?php echo $answers[2][0];?></button>
                    <button id="btn4" class="btn" name="answ" value="<?php echo $answers[3][1];?>"><?php echo $answers[3][0];?></button>
                </div>
            </div>

            <div class="controls">
                <button id="prevBtn" class="prevBtn btn hide" name="prevBtn">Предишен</button>
                <button id="nextBtn" class="nextBtn btn" name="nextBtn">Следващ</button>
                <button id="finishBtn" class="finishBtn btn hide" name="finishBtn" value="">Предай теста</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
