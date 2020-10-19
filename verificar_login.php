<?php 
session_start();

include 'banco.php';

$pdo = dbConnect();

$usuario = $_POST['t-usuario'];
$senha = $_POST['t-senha'];

$stmt = $pdo->prepare("
	SELECT NOR_USUARIO, NOR_SENHA FROM IPET_USUARIO_NORMAL 
	WHERE (NOR_USUARIO = ? AND NOR_SENHA = ?) 
	");
$stmtOng = $pdo->prepare("
	SELECT ONG_USUARIO, ONG_SENHA, ONG_NOME FROM IPET_USUARIOS_ONG 
	WHERE (ONG_USUARIO = ? AND ONG_SENHA = ?) 
	");
$stmt -> execute([$usuario, $senha]);
$stmtOng -> execute([$usuario, $senha]);

$row = $stmt->rowCount();

$rowOng = $stmtOng->rowCount();
if ($row == 1) {
	$usuario_normal = $stmt->fetchAll();
	$_SESSION['nome'] = $usuario_normal[0]['NOR_USUARIO'];
	header('location:index.php');
	exit();
}
	elseif ($rowOng == 1) {
	$usuario_ong = $stmtOng->fetchAll();
	$_SESSION['nome_ong'] = $usuario_ong[0]['ONG_NOME'];
	header('location:index.php');
	exit();
	}
 else{
   	$_SESSION['nao-autenticado'] = true;
   	header("location:login.php");
   	exit();
 }

 ?>