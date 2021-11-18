<?php

$text = $_POST['text'];
$pdo = new PDO("mysql:host=localhost;dbname=users", "root", "");
$sql = "INSERT INTO `texts` (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
header("Location: task_9.php");




?>