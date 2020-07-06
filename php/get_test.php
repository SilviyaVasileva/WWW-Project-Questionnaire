<?php
require_once('quizDB.php');
require_once('test_query.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- answer id ; creator-id - user id ; test-name ; test - type(test-test,anketa-quiz) ; test - id ; 
    question descr ; points; curr ans id - checks if true or false - returns the answ num ; quest id ; 
    answ num ; answ text-->
<script type="text/javascript">var jArray = <?php echo json_encode($rows, JSON_UNESCAPED_UNICODE); ?>;
console.log(jArray);
</script>
<script type="text/javascript" src="../js/show-test.js"></script>
</body>
</html>

