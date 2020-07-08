<?php
require_once('quizDB.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<title>Регистрация</title>
</head>
<body>

<div class="mainPage">
	<?php
		session_start();

		if(isset($_SESSION['user'])) {
			// if the user is logged shows all tests
			$sql_tests = "SELECT id, testName FROM `test` WHERE testType = 'test'";
		 	$result_tests = $conn->query($sql_tests) or die("failed!");

		 	// if the user is logged shows all quizzes
			$sql_quiz = "SELECT id, testName FROM `test` WHERE testType = 'quiz'";
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
			if ($_SESSION['userType'] == 'lector') {
				echo '<a href="../php/add-quiz.php?add-quiz">Добави тест</a><br/>';
				echo '<a href="../php/add-questionnarie.php?add-questionnarie">Добави анкета</a><br/>';
			}
			if(isset($_POST['testId'])){
				// echo "HEREEEEE <br/>";
				// echo $_POST['testId'];
				$_SESSION['testId'] = $_POST['testId'];
				header("location:get-test.php");
			}
			// else{
				// echo "not HEREEE <bt/>";
			// }

		}
		else{
			echo "neeee TT <br/>";
		}
	?>
</div>
<div class="quizAndQuestionnare">
	<script type="text/javascript">var questionnarie_arr = <?php echo json_encode($q_rows, JSON_UNESCAPED_UNICODE); ?>;
	var quiz_arr = <?php echo json_encode($t_rows, JSON_UNESCAPED_UNICODE); ?>;
	</script>
	<script src="../js/menu.js" defer></script>
	<form action="menu.php" method="post">
	<div class="questionnarie">
		<h3>Анкети</h3>
		<div id="questionnarie" class="questionnarie">
		</div>
	</div>
	<div class="quiz">
		<h3>Тестове</h3>
		<div id="quiz" class="quiz">
		</div>
	</div>
</div>
</form>


</body>
</html>