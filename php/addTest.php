<?php
require_once('quizDB.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Създаване на тест</title>
</head>
<body>

<div class="phpTest">
	<?php
		session_start();
		// check if the user is logged in
		if(isset($_SESSION['user'])) {
			echo '<a href="../php/logout.php?logout">Изход</a><br/>';
			echo '<a href="../php/menu.php?menu">Меню</a>';
			if ($_SESSION['type'] == 'lector') {
				// if the user is logged and its lector in shows the form


				$sql_tests = "SELECT * FROM `test` WHERE type = 'test' AND creator_id = ".$_SESSION['id'];
			 	$result_tests = $conn->query($sql_tests) or die("failed!");

				if (isset($_POST['createTest'])) {
			 		// create a test in db
				 	$testName = $_POST['testName'];
			 		$sql = "INSERT INTO test (test_name, creator_id) VALUES (?,?)";
					$stmtinsert = $conn->prepare($sql);
					$result = $stmtinsert->execute([$testName, $_SESSION['id']]);
					if($result) {
			            header("location:addTest.php");	
					}
					else {
						echo "Wrong input! <br />";
					}
				}
				if (isset($_POST['createQuestion'])) {


			 		// Create a question
			 		$test_id = $_POST['test_names'];
			 		// echo $test_id;
				 	$question = $_POST['question'];
				 	$points = $_POST['points'];
				 	$correct_answer = $_POST['correct_answer'];

				 	echo $test_id."  въпрос ".$question."  точки ".$points."  отговор ".$correct_answer;

					 	$sql_create_q = "INSERT INTO `question` (test_id, description, points, correct_answer_id) VALUES (?,?,?,?)";
						$stmtinsert_question = $conn->prepare($sql_create_q);
						$result_create_q = $stmtinsert_question->execute([$test_id, $question, $points, $correct_answer]);


				 	// Get question id

				 	$sql_qid = "SELECT * FROM `question` WHERE description = '".$question."'";
			 		$result_q = $conn->query($sql_qid) or die("failed!");

			 		$q_id = 0;

			 		while ($row_q = $result_q->fetch(PDO::FETCH_ASSOC)) {
			 			$q_id = $row_q['id'];
			 		}

			 		// create answers

			 		$answ1 = $_POST['answ1'];
			 		$answ2 = $_POST['answ2'];
			 		$answ3 = $_POST['answ3'];
			 		$answ4 = $_POST['answ4'];

					$sql_create_answ1 = "INSERT INTO `answer` (question_id, answer_number, answer_text) VALUES (?,?,?)";
					$stmtinsert_answ1 = $conn->prepare($sql_create_answ1);
					$result_answ1 = $stmtinsert_answ1->execute([$q_id, 1, $answ1]);

					$sql_create_answ2 = "INSERT INTO `answer` (question_id, answer_number, answer_text) VALUES (?,?,?)";
					$stmtinsert_answ2 = $conn->prepare($sql_create_answ2);
					$result_answ2 = $stmtinsert_answ2->execute([$q_id, 2, $answ2]);

					$sql_create_answ3 = "INSERT INTO `answer` (question_id, answer_number, answer_text) VALUES (?,?,?)";
					$stmtinsert_answ3 = $conn->prepare($sql_create_answ3);
					$result_answ3 = $stmtinsert_answ3->execute([$q_id, 3, $answ3]);

					$sql_create_answ4 = "INSERT INTO `answer` (question_id, answer_number, answer_text) VALUES (?,?,?)";
					$stmtinsert_answ4 = $conn->prepare($sql_create_answ4);
					$result_answ4 = $stmtinsert_answ4->execute([$q_id, 4, $answ4]);

				}
			}
		}

	?>
</div>

<div class="test_form">
	<form action="addTest.php" method="post">
		<h2>Добави тест:</h2>

		<label for="testName"><b>Заглавие на теста</b></label>
		<input type="text" name="testName" required>

		<input type="submit" name="createTest" value="Добави">

	</form>
	<form action="addTest.php" method="post">
		<h2>Добави въпрос:</h2>

		<select name="test_names">
			<?php 
			while ($row_test = $result_tests->fetch(PDO::FETCH_ASSOC)):;?>
			<option value="<?php echo $row_test['id'] ?>"><?php echo $row_test['test_name'];?></option>
			<?php endwhile;?>
		</select>

		<label for="question"><b><br/>Въпрос</b></label>
		<input type="text" name="question" required>
		<label for="points"><b><br/>Точки </b></label>
		<input id="points" type="number" name="points" placeholder="Точки за въпроса">
		<label for="answ1"><b><br/>Отговор 1 </b></label>
		<input type="text" name="answ1" required>
		<label for="answ2"><b><br/>Отговор 2</b></label>
		<input type="text" name="answ2" required>
		<label for="answ3"><b><br/>Отговор 3</b></label>
		<input type="text" name="answ3" required>
		<label for="answ4"><b><br/>Отговор 4</b></label>
		<input type="text" name="answ4" required>

		<select name="correct_answer">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		</select>


		<input type="submit" name="createQuestion" value="Добави">
	</form>
</div>

</body>
</html>