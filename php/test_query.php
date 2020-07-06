<?php
require_once('quizDB.php');
?>
<?php 
	
	
		$test_id = 5;
		$sql_test = "SELECT * FROM `test` JOIN `question` ON `test`.id = `question`.test_id JOIN `answer` ON `question`.id = `answer`.question_id WHERE `test`.id = ".$test_id;
		// $stmtinsert = $conn->prepare($sql_test);
		$result = $conn->query($sql_test) or die("NOOOOOOOO");
		$result->execute([]);
		$rows = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$rows[] = $row;
		}

		//print json_encode($rows, JSON_UNESCAPED_UNICODE);
		// var_dump($row);
			
	