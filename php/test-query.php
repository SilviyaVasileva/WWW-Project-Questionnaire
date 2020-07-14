<?php
//  database connection
require_once('quizDB.php');
?>
<?php 
	// starts session
	session_start();

	// check if session id created and if it is get the required test
	if(isset($_SESSION['testId'])){
		$testId = $_SESSION['testId'];


		$sql_test = "SELECT * FROM `test` JOIN `question` ON `test`.id = `question`.testId JOIN `answer` ON `question`.id = `answer`.questionId WHERE `test`.id = ".$testId;
		$result = $conn->query($sql_test) or die("Test not found");
		$result->execute([]);

		// array with all the questions and answers
		$rows = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$rows[] = $row;
		}
	}