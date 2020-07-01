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
			echo '<a href="logout.php?logout">Изход</a><br/>';
			echo '<a href="addTest.php?addTest">Добави тест</a>';
		}
		else{
			echo "neeee TT <br/>";
		}
	?>
</div>

</body>
</html>