<?php
require_once('quizDB.php');
?>
<?php 

	session_start();
	if(isset($_SESSION['testId'])){
		$testId = $_SESSION['testId'];

		$_SESSION['questionId'] = 0;

		$sql_test = "SELECT * FROM `test` JOIN `question` ON `test`.id = `question`.testId JOIN `answer` ON `question`.id = `answer`.questionId WHERE `test`.id = ".$testId;
		// $stmtinsert = $conn->prepare($sql_test);
		$result = $conn->query($sql_test) or die("NOOOOOOOO");
		$result->execute([]);
		$rows = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$rows[] = $row;
		}
		
		// print json_encode($rows, JSON_UNESCAPED_UNICODE);
		// var_dump($row);
	}