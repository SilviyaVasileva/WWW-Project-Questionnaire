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
			$sql_tests = "SELECT id, test_name FROM `test` WHERE type = 'test' AND creator_id = ".$_SESSION['id'];
		 	$result_tests = $conn->query($sql_tests) or die("failed!");

		 	// if the user is logged shows all quizzes
			$sql_quiz = "SELECT id, test_name FROM `test` WHERE type = 'quiz' AND creator_id = ".$_SESSION['id'];
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
<div class="questionnare">
	<script type="text/javascript">var q_arr = <?php echo json_encode($q_rows, JSON_UNESCAPED_UNICODE); ?>;
	var t_arr = <?php echo json_encode($t_rows, JSON_UNESCAPED_UNICODE); ?>;
	console.log(q_arr);
	console.log(t_arr);

</script>
</div>


</body>
</html>