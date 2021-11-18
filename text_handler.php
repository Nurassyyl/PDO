<?php 

session_start();
// $connect = mysqli_connect("localhost", "root", "", "users");
$pdo = new PDO('mysql:host=localhost;dbname=users', 'root', ''); 

$text = $_POST['text']; 
$sql = "SELECT * FROM texts WHERE text = :text ";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);
// var_dump($task);die;


if ($task['text'] == $text) {
  $_SESSION['error_text'] = "You should check in on some of those fields below.";
  header("Location: task_10.php");
} else {
  $text_upload = " INSERT INTO `texts` (`id`, `text`) VALUES (NULL, :text) ";
  $statement = $pdo->prepare($text_upload);
  $statement->execute(['text' => $text]);
  header("Location: task_10.php");
}



// $text_db = mysqli_query($connect, "SELECT * FROM `texts` WHERE `text` = '$text' ");
// $text_db = mysqli_fetch_assoc($text_db);
// $num =  mysqli_num_rows($text_db);
// echo $num;


?>