<?php 
session_start();

if (!isset($_SESSION['anonimo'])) {
	session_destroy();
	header('location:index.php');

}

include 'banco.php';

$pdo = dbConnect();

$usuario = $_POST['t-usuario'];
$senha = $_POST['t-senha'];

$stmt = $pdo->prepare("
	SELECT NOR_USUARIO, NOR_SENHA, NOR_CODIGO FROM IPET_USUARIO_NORMAL 
	WHERE (NOR_USUARIO = ? AND NOR_SENHA = ?) 
	");
$stmtOng = $pdo->prepare("
	SELECT ONG_USUARIO, ONG_SENHA, ONG_NOME, ONG_ID FROM IPET_USUARIOS_ONG 
	WHERE (ONG_USUARIO = ? AND ONG_SENHA = ?) 
	");
$stmt -> execute([$usuario, $senha]);
$stmtOng -> execute([$usuario, $senha]);

$row = $stmt->rowCount();

$rowOng = $stmtOng->rowCount();
if ($row == 1) {
	$usuario_normal = $stmt->fetchAll();
	unset($_SESSION['anonimo']);
	$_SESSION['nome'] = $usuario_normal[0]['NOR_USUARIO'];
	$_SESSION['id_usuario'] = $usuario_normal[0]['NOR_CODIGO'];

	header('location:index.php');
	exit();
}
	elseif ($rowOng == 1) {
	$usuario_ong = $stmtOng->fetchAll();
	unset($_SESSION['anonimo']);
	$_SESSION['nome_ong'] = $usuario_ong[0]['ONG_NOME'];
	$_SESSION['id_ong'] = $usuario_ong[0]['ONG_ID'];
	header('location:index.php');
	exit();
	}
 else{
   	$_SESSION['nao-autenticado'] = true;
   	header("location:login.php");
   	exit();
 }

 ?>