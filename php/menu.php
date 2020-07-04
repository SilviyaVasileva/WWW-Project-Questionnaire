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
			echo "hiiiii <br/>";
			echo $_SESSION['user']."<br/>";
			echo '<a href="../php/logout.php?logout">Изход</a><br/>';
			echo '<a href="../php/addTest.php?addTest">Добави тест</a><br/>';
			echo '<a href="../php/addQuiz.php?addQuiz">Добави анкета</a><br/>';

		}
		else{
			echo "neeee TT <br/>";
		}
	?>
</div>

</body>
</html>