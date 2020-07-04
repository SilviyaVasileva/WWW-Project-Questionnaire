<?php
require_once('quizDB.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/registration.css">
	<title>Регистрация</title>
</head>
<body>

<div class="phpReg">
	<?php
		if (isset($_POST['createUser'])) {
		 	// echo "user id created";
		 	$username = $_POST['username'];
		 	$email = $_POST['email'];
		 	$password = $_POST['password'];
		 	$confirm_password = $_POST['confirm_password'];
		 	$fn = $_POST['FN'];
		 	$userType = $_POST['userType'];
		 	$utype = '';
		 	foreach ($userType as $t){ 
		 		$utype = $t;
   				// echo $utype."<br />";
			}
		 	if($password==$confirm_password) {
		 		$sql = "INSERT INTO user (username, email, password, FN, type) VALUES (?,?,?,?,?)";
				$stmtinsert = $conn->prepare($sql);
				$result = $stmtinsert->execute([$username, $email, sha1($password), $fn, $utype]);
				if($result) {
					session_start();

					$sql_u = "SELECT * FROM `user` WHERE email = '".$email."' and password = '".sha1($password)."'";
				 	$result_u = $conn->query($sql_u) or die("failed!");

					while($row = $result_u->fetch(PDO::FETCH_ASSOC)) {
						$_SESSION['email']=$row['email'];
						$_SESSION['user']=$row['username'];
						$_SESSION['id']=$row['id'];
						$_SESSION['type']=$row['type'];
		                header("location:menu.php");
					}

					header("Location: menu.php");
					//this is for the redirection. Need to create a session
				}
		 	}
		} 
	?>
</div>

<div class="reg_form">
	<form action="registration.php" method="post" id="registration-form">
			<h2>Регистрация:</h2>

			<input id="username" type="text" name="username" placeholder="Потребителско име" required>
			
			<input id="password" type="password" name="password" placeholder="Парола" required>
			<input id="confirm-password" type="password" name="confirm_password" placeholder="Потвърди парола" required>

			<input id="email" type="email" name="email" placeholder="Email" required>

			
			<input id="FN" type="number" name="FN" placeholder="Факултетен номер">

			<h3>Вид потребител:</h3>
			<label for="userType"><b>Студент</b></label>
			<input type="checkbox" name="userType[]" id="userType" value="student">
			<label for="userType"><b>Преподавател</b></label>
			<input type="checkbox" name="userType[]" id="userType" value="lector">

			<input type="submit" name="createUser" value="Регистрирай се">
			<p><a href="login.php">Влез в профил</a></p>
			<div class="messages">
				<p id="onError"></p>
  			</div>
  			<script src="../js/registration.js"></script>
	</form>	
</div>
</body>
</html>