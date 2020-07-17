<?php
// database connection
require_once('quizDB.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/loginAndRegistration.css">
	<title>Регистрация</title>
</head>
<body>

<div class="phpReg">
	<?php
		if (isset($_POST['createUser'])) {
			// get user data
		 	$username = $_POST['username'];
		 	$email = $_POST['email'];
		 	$password = $_POST['password'];
		 	$confirmPassword = $_POST['confirmPassword'];
		 	$fn = $_POST['FN'];
		 	$userType = $_POST['userType'];
		 	$utype = '';
		 	foreach ($userType as $t){ 
		 		$utype = $t;
			}
			if($password==$confirmPassword) {
				// saves the registration
				$sql = "INSERT INTO user (username, email, password, FN, userType) VALUES (?,?,?,?,?)";
				$stmtinsert = $conn->prepare($sql);
				$result = $stmtinsert->execute([$username, $email, sha1($password), $fn, $utype]);
				if($result) {
					// start a session
					session_start();

					// user's data
					$sql_u = "SELECT * FROM `user` WHERE email = '".$email."' and password = '".sha1($password)."'";
				 	$result_u = $conn->prepare($sql_u);
				 	$result_u->execute([]);

		 			// create user session
					while($row = $result_u->fetch(PDO::FETCH_ASSOC)) {
						$_SESSION['email']=$row['email'];
						$_SESSION['user']=$row['username'];
						$_SESSION['id']=$row['id'];
						$_SESSION['userType']=$row['userType'];
		                header("location:menu.php");
					}

					header("Location: menu.php");
				}
		 	}
		} 
	?>
</div>

<div class="registrationForm">
	<form action="registration.php" method="post" id="registrationForm">
		<h2>Регистрация:</h2>

		<input id="username" type="text" name="username" placeholder="Потребителско име" required>
			
		<input id="password" type="password" name="password" placeholder="Парола" required>
		<input id="confirmPassword" type="password" name="confirmPassword" placeholder="Потвърди парола" required>

		<input id="email" type="email" name="email" placeholder="Email" required>
		<input id="FN" type="number" name="FN" placeholder="Факултетен номер">

		<h3>Вид потребител:</h3>
		<label for="userType"><b>Студент</b></label>
		<input type="checkbox" name="userType[]" id="userType" value="student">
		<label for="userType"><b>Преподавател</b></label>
		<input type="checkbox" name="userType[]" id="userType" value="lector">

		<input type="submit" name="createUser" value="Регистрирай се">
		<br>
		<a href="../index.php">Влез в профил</a>
		<div class="messages">
			<p id="onError"></p>
  		</div>
  		<script src="../js/registration.js"></script>
	</form>	
</div>
</body>
</html>