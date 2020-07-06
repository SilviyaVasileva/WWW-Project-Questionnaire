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
			$sql_tests = "SELECT * FROM `test` WHERE type = 'test' AND creator_id = ".$_SESSION['id'];
		 	$result_tests = $conn->query($sql_tests) or die("failed!");

		 	// if the user is logged shows all quizzes
			$sql_quiz = "SELECT * FROM `test` WHERE type = 'quiz' AND creator_id = ".$_SESSION['id'];
		 	$result_quiz = $conn->query($sql_quiz) or die("failed!");

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
<div class="buttons">
<form method="POST">
	<h2>Тестове:</h2>
	<?php 
	while ($row_test = $result_tests->fetch(PDO::FETCH_ASSOC)):;?>
	<button class='test_id' name='test_id' value="<?php echo $row_test['id'] ?>"><?php echo $row_test['test_name'];?></button>
	<?php endwhile;?>
	<h2>Анкети:</h2>
	<?php 
	while ($row_quiz = $result_quiz->fetch(PDO::FETCH_ASSOC)):;?>
	<button class='test_id' name='test_id' value="<?php echo $row_quiz['id'] ?>"><?php echo $row_quiz['test_name'];?></button>
	<?php endwhile;?>
</form>
</div>
</body>
</html>