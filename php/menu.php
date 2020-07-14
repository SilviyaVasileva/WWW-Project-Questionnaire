<?php
require_once('quizDB.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/navigation.css">
	<title>Меню</title>
</head>
<body>

<div class="mainPage">
	<?php
		session_start();

		if(isset($_SESSION['user'])) {
			
			$_SESSION['questionId'] = 0;
			// collect user's answers
            $userAnswers = array();
            $_SESSION['userAnswers'] = $userAnswers;

			// if the user is logged shows all tests
			$sql_tests = "SELECT id, testName FROM `test` WHERE testType = 'test'";
		 	$result_tests = $conn->query($sql_tests) or die("failed!");

		 	// if the user is logged shows all quizzes
			$sql_quiz = "SELECT id, testName FROM `test` WHERE testType = 'quiz'";
			$result_quiz = $conn->query($sql_quiz) or die("failed!");
			 
		 	// array for json
		 	$q_rows = array();
		 	$t_rows = array();

		 	while($q_row = $result_quiz->fetch(PDO::FETCH_ASSOC)) {
				$q_rows[] = $q_row;
			}
			while($t_row = $result_tests->fetch(PDO::FETCH_ASSOC)) {
				$t_rows[] = $t_row;
			}
			echo '<nav class="navigation"><ul>';
			echo '<li><a href="../php/logout.php">Изход</a></li>';

			if ($_SESSION['userType'] == 'lector') {
				//if the user is a lector add the add a quiz and a questionnarie option
				echo '<li><a href="../php/add-quiz.php?add-quiz">Добави тест</a></li>';
				echo '<li><a href="../php/add-questionnarie.php?add-questionnarie">Добави анкета</a><br/></li>';
			}
			echo '<li><a href="../php/results.php">Резултати</a></li>';
			echo '</ul></nav><br>';
			// open the test/quiz
			if(isset($_POST['testId'])){
				$_SESSION['testId'] = $_POST['testId'];
				header("location:get-test.php");
			}
			
		}
		else{
			echo "Влезте в профил, за да може да видите съдържанието <br>";
		}
	?>
</div>
<div class="quizAndQuestionnare">
	<script type="text/javascript">
		var questionnarie_arr = <?php echo json_encode($q_rows, JSON_UNESCAPED_UNICODE); ?>;
		var quiz_arr = <?php echo json_encode($t_rows, JSON_UNESCAPED_UNICODE); ?>;
	</script>
	<script src="../js/menu.js" defer></script>
	<form action="menu.php" method="post">
		<div class="questionnarie">
			<h3>Анкети</h3>
			<div id="questionnarie" class="questionnarie"></div>
		</div>
		<div class="quiz">
			<h3>Тестове</h3>
			<div id="quiz" class="quiz"></div>
		</div>
	</form>
</div>
</body>
</html>