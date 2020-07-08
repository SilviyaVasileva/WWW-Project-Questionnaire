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
<!-- answer id ; creator-id - user id ; test-name ; test - testType(test-test,anketa-quiz) ; test - id ; 
    question descr ; points; curr ans id - checks if true or false - returns the answ num ; quest id ; 
    answ num ; answ text-->
<?php 
	echo '<a href="../php/menu.php?menu">Меню</a>';
?>
<script type="text/javascript">var jArray = <?php echo json_encode($rows, JSON_UNESCAPED_UNICODE); ?>; console.log(jArray);
</script>
<script type="text/javascript" src="../js/show-test.js" defer></script>
<div class="wrapper">
    <div class="container">
        <div id="questionContainer" class="hide">
            <div id="question">Въпрос</div>
            <div id="answerBtns" class="btnGrid">
                <button class="btn">Отг 1</button>
                <button class="btn">Отг 2</button>
                <button class="btn">Отг 3</button>
                <button class="btn">Отг 4</button>
            </div>
        </div>
        <div class="controls">
            <button id="startBtn" class="startBtn btn">Направи теста</button>
            <button id="prevBtn" class="prevBtn btn hide">Предишен</button>
            <button id="nextBtn" class="nextBtn btn hide">Следващ</button>
        </div>
</div>
</div>
</body>
</html>