<?php
require_once('quizDB.php');
require_once('test-query.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/show-test.css">
    <title>Document</title>
</head>
<body>
    <?php 
        $endIndex = count($rows);
        $testName = "";


        if($endIndex == 0) {
            $testName = "No questions in the test.";
        }
        else {
            

            $testName = $rows[0]['testName'];
            $testId = $rows[0]['testId'];

            // echo $testName."<br/>";
            $questionDescription = "";
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
            
            // echo $questionIndex."<br/>";
            
            if($questionIndex >= $startIndex && $questionIndex <= $endIndex - 3) {
                $questionDescription = $rows[$questionIndex]['questionDescription'];
                $questionId = $rows[$questionIndex]['questionId'];
                // echo $questionDescription."<br/>";
                $answers = array();
                $correct_answer = $rows[$questionIndex]['correctAnswerNumber'];

                for ($i=$questionIndex; $i < $questionIndex + 4; $i++) { 
                    $answers[] = [$rows[$i]['answerDescription'], $rows[$i]['answerNumber']];
                }
                // var_dump($answers);
            }
            // else {
            //     echo $questionIndex." ".$endIndex;
            // }

            //
            //userAnswers
            //
            
            if (isset($_POST['answ'])) {
                $_SESSION['userAnswers'][$questionIndex/4] = $_POST['answ'];
                // echo "hereee<br/>";
            }
            // var_dump($_SESSION['userAnswers']);
            // echo "<br/>";
        }
        

        // echo $_POST['a-num'];

        if(isset($_POST['finishBtn'])){
            // $_SESSION['questionId'] = 0;
            // var_dump($_SESSION['userAnswers']);
            // echo "<br/>";
            // echo $_SESSION['userAnswers'][0]."<br/>";
            // echo $_SESSION['userAnswers'][1]."<br/>";
            // echo $_SESSION['userAnswers'][2]."<br/>";

            // do the math.....
            $userAnswers = $_SESSION['userAnswers'];
            $points = 0;
            $sql = "INSERT INTO `user_test` (userId, solvedTestId) VALUES (?,?)";
                $stmtinsert = $conn->prepare($sql);
                $result = $stmtinsert->execute([$_SESSION['id'], $_SESSION['testId']]);

            $solvedTest = 0;
            $answerTable = array();
            // if ($result) {
            $sql_tests = "SELECT id FROM `user_test` ORDER BY id DESC LIMIT 1";
            $result_tests = $conn->query($sql_tests) or die("failed!");
            while($row_test = $result_tests->fetch(PDO::FETCH_ASSOC)) {
                $solvedTest = $row_test['id'];
            }
            // echo $solvedTest."<br/>";
            // }


            for ($i=0; $i < $endIndex/4; $i++) { 
                $qId = $rows[$i*4]['questionId'];
                $corrAnswer = $rows[$i*4]['correctAnswerNumber'];
                $userAnsw = $userAnswers[$i];
                $userPoints = $rows[$i*4]['points'];
                if($corrAnswer == $userAnsw) {
                    $points += $userPoints;
                }
                $answId = 0;

                for ($j=$i*4; $j < $i*4+4; $j++) { 
                    if ($userAnsw == $rows[$j]['answerNumber']) {
                        $answId = $rows[$j]['id'];
                    }
                }
                // echo $points." ".$qId." ".$corrAnswer." ".$userAnsw." ".$answId."<br/>";
                $answerTable[] = [$answId, $qId, $solvedTest, $userPoints];
                $sql_answ = "INSERT INTO `user_answer` (`answerId`, `questionId`, `userSolvedTestId`, `points`) VALUES (?,?,?,?)";
                $stmtinsert_answ = $conn->prepare($sql_answ);
                $result_answ = $stmtinsert_answ->execute([$answId, $qId, $solvedTest, $userPoints]);
                // if ($result_answ) {
                //     echo "heyyyyy";
                // }
            }

            $_SESSION['points'] = $points;
            header("location:menu.php");
        }



    // 
    // 

	?>
<!-- answer id ; creator-id - user id ; test-name ; test - type(test-test,anketa-quiz) ; test - id ; 
    question descr ; points; curr ans id - checks if true or false - returns the answ num ; quest id ; 
    answ num ; answ text-->
<!-- <form action="get_test.php" method="post"> -->

<div class="menu-page-ref">
    <?php 
        echo '<a href="../php/menu.php?menu">Меню</a>';
    ?>
</div>
<script type="text/javascript">
	var startIndex = <?php echo $startIndex/4;?>;
	var currIndex = <?php echo $questionIndex/4;?>;
	var endIndex = <?php echo $endIndex/4;?>;
</script> 
<script type="text/javascript" src="../js/show-test.js" defer></script>
<!-- <form> -->



<div class="wrapper">

<form method="post">
    <h2><?php echo $testName;?></h2>
    <!-- <button class="btn" name="idgaf" value="3">33333333</button> -->


    <div class="container">
        <div id="questionContainer">

            <div id="question"><?php echo $questionDescription;?></div>
            <div id="answerBtns" class="btnGrid">
                <button class="btn" name="answ" value="<?php echo $answers[0][1];?>"><?php echo $answers[0][0];?></button>
                <button class="btn" name="answ" value="<?php echo $answers[1][1];?>"><?php echo $answers[1][0];?></button>
                <button class="btn" name="answ" value="<?php echo $answers[2][1];?>"><?php echo $answers[2][0];?></button>
                <button class="btn" name="answ" value="<?php echo $answers[3][1];?>"><?php echo $answers[3][0];?></button>
            </div>
        </div>

        <div class="controls">
            <button id="prevBtn" class="prevBtn btn hide" name="prevBtn">Предишен</button>
            <button id="nextBtn" class="nextBtn btn" name="nextBtn">Следващ</button>
            <button id="finishBtn" class="finishBtn btn hide" name="finishBtn" value="">Предай теста</button>
        </div>
</div></div>
</form>
</body>
</html>
