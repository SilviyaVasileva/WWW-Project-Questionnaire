<?php
require_once('quizDB.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Тестът е предаден</title>
</head>
<body>
<?php
	session_start();
	// check if the user is logged in
	if(isset($_SESSION['user'])) {
		echo '<ul>';
		echo '<li><a href="../php/logout.php?logout">Изход</a><br/></li>';
		echo '<li><a href="../php/menu.php?menu">Меню</a></li>';
		echo '</ul>';
		if ($_SESSION['testId']) {
			$testId = $_SESSION['testId'];
			$sql_test = "SELECT testType FROM `test` WHERE `test`.id = ".$testId;
			$result = $conn->query($sql_test) or die("Cound.t get the test type");
			$result->execute([]);
			$testType = '';
			if ($result) {
				# code...
			}
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$testType = $row['testType'];
			}
			if($testType == 'test') {
				//
				echo "<h2>Вашите точки са ".$_SESSION['points']."</h2>";
			}
			else {
				echo "<h2>Вашите отговори бяха предадени успешно!</h2>";
			}
		}
	}
?>
</body>
</html>