<?php
require_once('quizDB.php');
require_once('test_query.php');
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
<!-- answer id ; creator-id - user id ; test-name ; test - type(test-test,anketa-quiz) ; test - id ; 
    question descr ; points; curr ans id - checks if true or false - returns the answ num ; quest id ; 
    answ num ; answ text-->
<script type="text/javascript">var jArray = <?php echo json_encode($rows, JSON_UNESCAPED_UNICODE); ?>; console.log(jArray);
</script>
<script type="text/javascript" src="../js/show-test.js" defer></script>
<div class="wrapper">
        <div id="question-container" class="hide">
            <div id="question">Въпрос</div>
            <div id="answer-btns" class="btn-grid">
                <button class="btn">Отг 1</button>
                <button class="btn">Отг 2</button>
                <button class="btn">Отг 3</button>
                <button class="btn">Отг 4</button>
            </div>
        </div>
        <div class="controls">
            <button id="start-btn" class="start-btn btn">Направи теста</button>
            <button id="prev-btn" class="prev-btn btn hide">Предишен</button>
            <button id="next-btn" class="next-btn btn hide">Следващ</button>
        </div>
</div>
</body>
</html>