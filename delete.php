<?php 
session_start();
include 'banco.php';

$id = $_GET['id'];

$pdo = dbConnect();

$query = "DELETE FROM IPET_ANIMAIS WHERE ANI_CODIGO=?";

$stmt = $pdo->prepare($query);

$stmt->execute([$id]);

header("location: perfil.php");
?>