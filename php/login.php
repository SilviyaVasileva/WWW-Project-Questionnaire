<?php
require_once('quizDB.php')
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
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
				$_SESSION['email']=$row['email'];
				$_SESSION['user']=$row['username'];
				$_SESSION['id']=$row['id'];
				$_SESSION['type']=$row['type'];
				// echo $_SESSION['user'];
                header("location:menu.php");
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
	<form id="login-form" action="login.php" method="post">
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