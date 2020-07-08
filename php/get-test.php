<?php
require_once('quizDB.php');
require_once('test-query.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="../css/show-test.css"> -->
    <title>Document</title>
</head>
<body>
    <?php 
        $endIndex = count($rows);
        echo "<br/>";
        // var_dump($rows);
        // echo json_encode($rows, JSON_UNESCAPED_UNICODE);
        echo "<br/>";


        echo "endIndex: ".$endIndex."<br/>";
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
            
            echo $questionIndex."<br/>";
            
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
            else {
                echo $questionIndex." ".$endIndex;
            }

            //
            //userAnswers
            //
            
            if (isset($_POST['answ'])) {
                $_SESSION['userAnswers'][$questionIndex/4] = $_POST['answ'];
            }
            // var_dump($_SESSION['userAnswers']);
            // echo "<br/>";
        }
        if(isset($_POST['finishBtn'])){
            // $_SESSION['questionId'] = 0;
            // var_dump($_SESSION['userAnswers']);
            // echo "<br/>";
            // echo $_SESSION['userAnswers'][0]."<br/>";
            // echo $_SESSION['userAnswers'][1]."<br/>";
            // echo $_SESSION['userAnswers'][2]."<br/>";


            // header("location:menu.php");
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
<script type="text/javascript">var jArray = <?php echo json_encode($rows, JSON_UNESCAPED_UNICODE); ?>;
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
            <button id="nextBtn" class="nextBtn btn hide" name="nextBtn">Следващ</button>
            <button id="finishBtn" class="finishBtn btn hide" name="finishBtn">Предай теста</button>

        </div>

</div></div>
</form>
</body>
</html>