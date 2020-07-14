<?php
// database connection
require_once('quizDB.php')
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/loginAndRegistration.css">
	<title>Вписване</title>
</head>
<body>

<div class="phplogin">
	<?php
		// start a session
		session_start();
		if (isset($_POST['login'])) {
			// user's data
		 	$email = $_POST['email'];
		 	$password = sha1($_POST['password']);
			echo $email." ".$password."<br />";

			// check if user existes
		 	$sql = "SELECT * FROM `user` WHERE email = '".$email."' and password = '".$password."'";
		 	$result = $conn->query($sql) or die("failed!");

		 	// create user session
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$_SESSION['email']=$row['email'];
				$_SESSION['user']=$row['username'];
				$_SESSION['id']=$row['id'];
				$_SESSION['userType']=$row['userType'];
                header("location:menu.php");
			}
		} 
	?>
</div>

<div class="loginForm">
	<form id="loginForm" action="login.php" method="post">
			<h2>Вписване:</h2>

			<input id="email" type="email" name="email" placeholder="Email" required>

			<input id="password" type="password" name="password" placeholder="Парола" required>
			
			<input type="submit" name="login" value="Влез">
			<br>
			<a id="register" href="registration.php?registartion">Регистрирай се</a>
	</form>
</div>

</body>
</html>