<?php
// add database connection
require_once('quizDB.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/quiz-and-questionnarie.css">
	<link rel="stylesheet" type="text/css" href="../css/navigation.css">
	<title>Създаване на тест</title>
</head>
<body>

<div class="phpTest">
	<?php
		// start a session
		session_start();

		// check if the user is logged in
		if(isset($_SESSION['user'])) {
			echo '<nav class="navigation"><ul>';
			echo '<li><a href="../php/logout.php?logout">Изход</a></li>';
			if ($_SESSION['userType'] == 'lector') {
				//if the user is a lector add the add a quiz and a questionnarie option
				echo '<li><a href="../php/add-questionnarie.php?add-questionnarie">Добави анкета</a><br/></li>';
			}
			echo '<li><a href="../php/menu.php?menu">Меню</a></li>';
			echo '<li><a href="../php/results.php">Резултати</a></li>';
			echo '</ul></nav><br>';
			// if the user is logged and its lector in shows the form
			if ($_SESSION['userType'] == 'lector') {

				//  get all quizzes in created by the user
				$sql_tests = "SELECT * FROM `test` WHERE testType = 'test' AND creatorId = ".$_SESSION['id'];
			 	$result_tests = $conn->query($sql_tests) or die("failed!");

				if (isset($_POST['createQuiz'])) {
					// create a test in db
					$testName = $_POST['quizName'];
			 		$sql = "INSERT INTO test (testName, creatorId) VALUES (?,?)";
					$stmtinsert = $conn->prepare($sql);
					$result = $stmtinsert->execute([$testName, $_SESSION['id']]);
					if($result) {
			            header("location:add-quiz.php");	
					}
					else {
						echo "Wrong input! <br />";
					}
				}
				if (isset($_POST['createQuestion'])) {


			 		// Create a question
			 		$testId = $_POST['existingQuizNames'];
				 	$question = $_POST['question'];
				 	$points = $_POST['points'];
				 	$correct_answer = $_POST['correct_answer'];

					 	$sql_create_q = "INSERT INTO `question` (testId, questionDescription, points, correctAnswerNumber) VALUES (?,?,?,?)";
						$stmtinsert_question = $conn->prepare($sql_create_q);
						$result_create_q = $stmtinsert_question->execute([$testId, $question, $points, $correct_answer]);


				 	// Get question id

				 	$sql_qid = "SELECT * FROM `question` WHERE questionDescription = '".$question."'";
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

					// get all test in created by the user
					$sql_create_answ1 = "INSERT INTO `answer` (questionId, answerNumber, answerDescription) VALUES (?,?,?)";
					$stmtinsert_answ1 = $conn->prepare($sql_create_answ1);
					$result_answ1 = $stmtinsert_answ1->execute([$q_id, 1, $answ1]);

					$sql_create_answ2 = "INSERT INTO `answer` (questionId, answerNumber, answerDescription) VALUES (?,?,?)";
					$stmtinsert_answ2 = $conn->prepare($sql_create_answ2);
					$result_answ2 = $stmtinsert_answ2->execute([$q_id, 2, $answ2]);

					$sql_create_answ3 = "INSERT INTO `answer` (questionId, answerNumber, answerDescription) VALUES (?,?,?)";
					$stmtinsert_answ3 = $conn->prepare($sql_create_answ3);
					$result_answ3 = $stmtinsert_answ3->execute([$q_id, 3, $answ3]);

					$sql_create_answ4 = "INSERT INTO `answer` (questionId, answerNumber, answerDescription) VALUES (?,?,?)";
					$stmtinsert_answ4 = $conn->prepare($sql_create_answ4);
					$result_answ4 = $stmtinsert_answ4->execute([$q_id, 4, $answ4]);
				}

				
				$sql_q = "SELECT * FROM `test` JOIN `question` ON `test`.`id` = `question`.`testId` WHERE `test`.`creatorId` = '".$_SESSION['id']."'";
			 	$result_question = $conn->query($sql_q) or die("failed!");

				if (isset($_POST['editQuestion'])) {
					$editQuestionID = $_POST['QutionNames'];
					$editQuestion = $_POST['editQuestionDescr'];
				 	$editPoints = $_POST['editPoints'];
				 	$editCorrect_answer = $_POST['editCorrect_answer'];

				 	$sqlEditQ = "UPDATE `question` SET `questionDescription` = '".$editQuestion."', `points`= '".$editPoints."', `correctAnswerNumber`= '".$editCorrect_answer."'  WHERE `id` = '".$editQuestionID."'";
				 	$stmtinsertEditQ = $conn->prepare($sqlEditQ);
					$resultEditQ = $stmtinsertEditQ->execute([]);

					$editAnsw1 = $_POST['editAnsw1'];
			 		$editAnsw2 = $_POST['editAnsw2'];
			 		$editAnsw3 = $_POST['editAnsw3'];
			 		$editAnsw4 = $_POST['editAnsw4'];

			 		$sql_a = "SELECT * FROM `answer` WHERE `answer`.`questionId` = '".$editQuestionID."'";
			 		$result_answ = $conn->query($sql_a) or die("failed!");

			 		$answIds = array();

			 		while ($answ = $result_answ->fetch(PDO::FETCH_ASSOC)) {
			 			$answIds[] = $answ['id'];
			 			echo $answ['id']."<br/>";
			 		}

					$sql_create_answ1 = "UPDATE `answer` SET `answerNumber` = 1, `answerDescription`= '".$editAnsw1."' WHERE `id` = '".$answIds[0]."'";
					$stmtinsert_answ1 = $conn->prepare($sql_create_answ1);
					$result_answ1 = $stmtinsert_answ1->execute([]);

					$sql_create_answ2 = "UPDATE `answer` SET `answerNumber` = 2, `answerDescription`= '".$editAnsw2."' WHERE `id` = '".$answIds[1]."'";
					$stmtinsert_answ2 = $conn->prepare($sql_create_answ2);
					$result_answ2 = $stmtinsert_answ2->execute([]);

					$sql_create_answ3 = "UPDATE `answer` SET `answerNumber` = 3, `answerDescription`= '".$editAnsw3."' WHERE `id` = '".$answIds[2]."'";
					$stmtinsert_answ3 = $conn->prepare($sql_create_answ3);
					$result_answ3 = $stmtinsert_answ3->execute([]);

					$sql_create_answ4 = "UPDATE `answer` SET `answerNumber` = 4, `answerDescription`= '".$editAnsw4."' WHERE `id` = '".$answIds[3]."'";
					$stmtinsert_answ4 = $conn->prepare($sql_create_answ4);
					$result_answ4 = $stmtinsert_answ4->execute([]);
					header("location:add-quiz.php");
				}
			}
		}

	?>
</div>

<div class="quizForm">
	<form class="addNewQuiz" action="add-quiz.php" method="post">
		<h2>Добави тест:</h2>
		<label for="quizName"><b>Заглавие на теста</b></label>
		<br>
		<input type="text" name="quizName" required>
		<br><br>
		<input type="submit" name="createQuiz" value="Добави">
		<br>
	</form>
	<div class="contentsOfTest">
	<form class="addQuestion" action="add-quiz.php" method="post">
		<h2>Добави въпрос:</h2>
		<br>
		<select name="existingQuizNames">
			<?php 
			while ($row_test = $result_tests->fetch(PDO::FETCH_ASSOC)):;?>
			<option value="<?php echo $row_test['id'] ?>"><?php echo $row_test['testName'];?></option>
			<?php endwhile;?>
		</select>
		<br><br>
		<label for="question"><b>Въпрос</b></label>
		<input type="text" name="question" required>
		<br><br>
		<label for="points"><b>Точки</b></label>
		<input id="points" type="number" name="points" placeholder="Точки за въпроса">
		<br><br>
		<label for="answ1"><b>Отговор 1</b></label>
		<input type="text" name="answ1" required>
		<br><br>
		<label for="answ2"><b>Отговор 2</b></label>
		<input type="text" name="answ2" required>
		<br><br>
		<label for="answ3"><b>Отговор 3</b></label>
		<input type="text" name="answ3" required>
		<br><br>
		<label for="answ4"><b>Отговор 4</b></label>
		<input type="text" name="answ4" required>
		<br><br>
		<label><b>Правилен отговор на въпроса:</b>

		<select name="correct_answer">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		</select></label>
		<br><br>

		<input type="submit" name="createQuestion" value="Добави">
		<br>
	</form>


	<!-- edit question -->

	<form class="editQuestions" action="add-quiz.php" method="post">
	<h2>Промени въпрос:</h2><br>
		<select name="QuestionNames">
			<?php 
			while ($row_q = $result_question->fetch(PDO::FETCH_ASSOC)):;?>
			<option value="<?php echo $row_q['id'] ?>"><?php echo $row_q['questionDescription'];?></option>
			<?php endwhile;?>
		</select>
		<br><br>
		<label for="question"><b>Въпрос</b></label>
		<input type="text" name="editQuestionDescr" required>
		<br><br>
		<label for="points"><b>Точки</b></label>
		<input id="points" type="number" name="editPoints" placeholder="Точки за въпроса">
		<br><br>
		<label for="answ1"><b>Отговор 1</b></label>
		<input type="text" name="editAnsw1" required>
		<br><br>
		<label for="answ2"><b>Отговор 2</b></label>
		<input type="text" name="editAnsw2" required>
		<br><br>
		<label for="answ3"><b>Отговор 3</b></label>
		<input type="text" name="editAnsw3" required>
		<br><br>
		<label for="answ4"><b>Отговор 4</b></label>
		<input type="text" name="editAnsw4" required>
		<br><br>
		<label><b>Правилен отговор на въпроса:</b>

		<select name="editCorrect_answer">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		</select></label>
<br><br>

		<input type="submit" name="editQuestion" value="Промени">
		<br>
	</form>
	</div>
</div>

</body>
</html>