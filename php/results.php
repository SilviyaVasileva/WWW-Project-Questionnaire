<?php
require_once('quizDB.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/show-test.css">
    <title>Резултати от тестове</title>
    <style>
    	h2 {
    	  text-align: center;
    	  margin-top: 3%;
    	}
		table, th, td {
		  border: 1px solid black;
		  border-collapse: collapse;
		  background-color: white;
		  text-align: center;
		  margin: auto;
		  margin-top: 3%;

		  padding: 1em;
		}
	</style>
</head>
<body>

<?php
	session_start();
	if(isset($_SESSION['user'])){

		echo "<h2>Тестове</h2>";

		$sql_test = "SELECT username, `test`.`testName`, SUM(`user_answer`.`points`) AS points FROM `user` JOIN `user_test` ON `user`.id = `user_test`.userId JOIN `user_answer` ON `user_test`.id = `user_answer`.userSolvedTestId JOIN `test` ON `user_test`.`solvedTestId` = `test`.`id` WHERE `test`.`testType` = 'test' GROUP BY `user_answer`.`userSolvedTestId` ORDER BY `test`.`testType`, `test`.`testName";
		$result = $conn->query($sql_test) or die("NOOOOOOOO");
		$result->execute([]);
		$rows = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$rows[] = $row;
		}
		if (count($rows) > 0) { 
			echo "<table><tr><th>Потребител</th><th>Име на тест</th><th>Точки</th></tr>";
			foreach ($rows as $row) {
				echo "<tr><td>".$row['username']."</td><td>".$row['testName']."</td><td>".$row['points']."</td></tr>";
			}
			echo "</table>";
		}

		echo "<h2>Анкети</h2>";

		$sql_quiz = "SELECT `test`.`testName`, `question`.`questionDescription`, `answer`.`answerDescription`, COUNT(`answer`.`id`) as answCount FROM `user` JOIN `user_test` ON `user`.id = `user_test`.userId JOIN `user_answer` ON `user_test`.id = `user_answer`.userSolvedTestId JOIN `test` ON `user_test`.`solvedTestId` = `test`.`id` JOIN `question` ON `question`.`id` = `user_answer`.`questionId` JOIN `answer` ON `answer`.`id` = `user_answer`.`answerId` WHERE `test`.`testType` = 'quiz' GROUP BY `answer`.`id` ORDER BY`test`.`testName`, `answer`.`id` ";
		$result_quiz = $conn->query($sql_quiz) or die("NOOOOOOOO");
		$result_quiz->execute([]);
		$rows_q = array();
		while($row = $result_quiz->fetch(PDO::FETCH_ASSOC)) {
			$rows_q[] = $row;
		}
		if (count($rows_q) > 0) { 
			echo "<table><tr><th>Име на анкетата</th><th>Въпрос</th><th>Отговор</th><th>Брои пъти</th></tr>";
			foreach ($rows_q as $row) {
				echo "<tr><td>".$row['testName']."</td><td>".$row['questionDescription']."</td>><td>".$row['answerDescription']."</td><td>".$row['answCount']."</td></tr>";
			}
			echo "</table>";
		}
	}
?>
</body>
</html>