<?php 
session_start();

include 'bd.php';

$comentario = $_POST['comentario'];
$date = date("Y-m-d H:i:s");
$user = $_SESSION['login'];
$topic = $_POST['id_post'];



$stmt = $pdo->prepare("
    INSERT INTO COMMENTS( COM_CONTENT, COM_DATE, COM_US_ID, COM_TOP_ID)
VALUES (?,?,?,?)
    ");

$stmt->execute([$comentario, $date, $user, $topic]);
 
 var_dump($comentario, $date, $user, $topic);



header('location: home.php')






 ?>