<?php
require_once('quizDB.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
</head>
<body>

<div class="mainpage">
	<?php
		session_start();

		if(isset($_SESSION['user'])) {
			// if the user is logged shows all tests
			$sql_tests = "SELECT id, test_name FROM `test` WHERE type = 'test'";
		 	$result_tests = $conn->query($sql_tests) or die("failed!");

		 	// if the user is logged shows all quizzes
			$sql_quiz = "SELECT id, test_name FROM `test` WHERE type = 'quiz'";
			 $result_quiz = $conn->query($sql_quiz) or die("failed!");
			 
			// $print1 = $result_tests->fetchall(PDO::FETCH_ASSOC);
			// var_dump($print1);
			// echo '<br>';
		 	// array for json
		 	$q_rows = array();
		 	$t_rows = array();

		 	while($q_row = $result_quiz->fetch(PDO::FETCH_ASSOC)) {
				$q_rows[] = $q_row;
			}
			while($t_row = $result_tests->fetch(PDO::FETCH_ASSOC)) {
				$t_rows[] = $t_row;
			}

			echo '<a href="../php/logout.php?logout">Изход</a><br/>';
			if ($_SESSION['type'] == 'lector') {
				echo '<a href="../php/addTest.php?addTest">Добави тест</a><br/>';
				echo '<a href="../php/addQuiz.php?addQuiz">Добави анкета</a><br/>';
			}
			if(isset($_POST['test_id'])){
				echo $_POST['test_id'];
				$_SESSION['test_id'] = $_POST['test_id'];
				header("location:get_test.php");
			}

		}
		else{
			echo "neeee TT <br/>";
		}
	?>
</div>
<div class="quiz-and-questionnare">
	<script type="text/javascript">var quiz_arr = <?php echo json_encode($q_rows, JSON_UNESCAPED_UNICODE); ?>;
	var questionnarie_arr = <?php echo json_encode($t_rows, JSON_UNESCAPED_UNICODE); ?>;
	</script>
	<script src="../js/menu.js"></script>
	<div class="questionarrie">
		<h3>Анкети</h3>
		<div class="questionarrie">
			<p id="first-questionarrie"></p>
			<p id="second-questionarrie"></p>
			<p id="third-questionarrie"></p>
		</div>
	</div>
	<div class="quiz">
		<h3>Тестове</h3>
		<div class="quiz">
			<p id="first-quiz"></p>
			<p id="second-quiz"></p>
			<p id="third-quiz"></p>
		</div>
	</div>
</div>


</body>
</html>