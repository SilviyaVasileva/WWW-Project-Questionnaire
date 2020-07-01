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
					echo "Registered! <br />";
				}
				else {
					echo "Wrong input! <br />";
				}
		 	}

			
		// 	echo $username."<br />";

		} 
	?>
</div>

<div class="reg_form">
	<form action="registration.php" method="post">
		<div class="container">
			<h2>Регистрация:</h2>

			<label for="username"><b>Потребителско име</b></label>
			<input type="text" name="username" required>

			<label for="email"><b>Емейл адрес</b></label>
			<input type="email" name="email" required>

			<label for="password"><b>Парола</b></label>
			<input type="password" name="password" required>

			<label for="confirm_password"><b>Потвърди парола</b></label>
			<input type="password" name="confirm_password" required>

			<label for="FN"><b>Факултетен номер</b></label>
			<input type="number" name="FN">

			<h3>Вид потребител:</h3>
			<label for="userType"><b>Студент</b></label>
			<input type="checkbox" name="userType[]" id="userType" value="student">
			<label for="userType"><b>Преподавател</b></label>
			<input type="checkbox" name="userType[]" id="userType" value="lector">

			<input type="submit" name="createUser" value="Регистрирай се">
			<p><a href="login.php">Влез в профил</a></p>
		</div>
	</form>
</div>

</body>
</html>