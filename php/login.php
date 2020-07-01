<?php
require_once('quizDB.php')
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Вписване</title>
</head>
<body>

<div class="phplogin">
	<?php
		session_start();
		if (isset($_POST['login'])) {

		 	$email = $_POST['email'];
		 	$password = sha1($_POST['password']);
			echo $email." ".$password."<br />";

		 	$sql = "SELECT * FROM `user` WHERE email = '".$email."' and password = '".$password."'";
		 	$result = $conn->query($sql) or die("failed!");

			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$_SESSION['user']=$_POST['email'];
				echo $_SESSION['user'];
                header("location:mainpage.php");
			}
			// if($result->fetch(PDO::FETCH_ASSOC)) {
			// 	echo "aaaaa <br/>";
			// }
			// else{
			// 	echo "bbbaaaaa <br/>";
			// }
			// echo "here2 <br/>";
		} 
	?>
</div>

<div class="login_form">
	<form action="login.php" method="post">
		<div class="container">
			<h2>Вписване:</h2>

			<label for="email"><b>Емейл адрес</b></label>
			<input type="email" name="email" required>

			<label for="password"><b>Парола</b></label>
			<input type="password" name="password" required>

			<input type="submit" name="login" value="Влез">
		</div>
	</form>
</div>
<a href="registration.php?registartion">Регистрирай се</a>
</body>
</html>