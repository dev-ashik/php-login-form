<?php
// User Accounts

$dbHost = 'localhost'; // Host name
$dbName = 'users'; // database name
$dbUserName = 'devashik'; // User name
$dbPass = '12345678'; // User password


//connecting to data base
$dbh = new PDO("mysql:host=$dbHost; dbname=$dbName", $dbUserName, $dbPass);

// $sqlQuery = "INSERT INTO `user`(`username`, `email`) VALUES ('$name','$email')";
// $dbh->query($sqlQuery);

$conn = new mysqli($dbHost, $dbUserName, $dbPass, $dbName);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>