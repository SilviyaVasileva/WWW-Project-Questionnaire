
<?php
// $host = "localhost";
// $dbname = "quiz";
// $user = "azaz";
// $pass = "parola123";

$host = "localhost";
$dbname = "quiz";
$user = "root";
$pass = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXEPTION);