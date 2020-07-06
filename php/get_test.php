<?php
require_once('quizDB.php');
require_once('test_query.php');
?>
<script type="text/javascript">var jArray = <?php echo json_encode($rows, JSON_UNESCAPED_UNICODE); ?>;
console.log(jArray);
</script>
<script type="text/javascript" src="test.js"></script>
