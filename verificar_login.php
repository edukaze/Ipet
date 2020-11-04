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


	$query = $pdo->prepare("
		SELECT * FROM IPET_USUARIO_NORMAL
		");
	$query->execute();
	$row1 = $query->fetchAll();
	foreach ($row1 as $row) {
	
	if ($row['NOR_USUARIO'] == $usuario) {

	$senhadb = password_verify($senha, $row['NOR_SENHA']);
if ($senhadb) {

		$_SESSION['nome'] = $row['NOR_USUARIO'];
		$_SESSION['id_usuario'] = $row['NOR_CODIGO'];
		unset($_SESSION['anonimo']);
		header('location:index.php');
		exit();
	
		}
	}

	}

$queryOng = $pdo->prepare("
	SELECT * FROM IPET_USUARIOS_ONG 
	");
$queryOng->execute();
$verifiOng = $queryOng->fetchAll();
 	foreach ($verifiOng as $dado) {

if ($dado['ONG_USUARIO'] == $usuario) {
	
$senhadbOng = password_verify($senha,$dado['ONG_SENHA']);

if ($senhadbOng) {
		unset($_SESSION['anonimo']);
		$_SESSION['nome_ong'] = $dado['ONG_NOME'];
		$_SESSION['id_ong'] = $dado['ONG_ID'];
		header('location:index.php');
		exit();
		}
	}
}
	$_SESSION['nao-autenticado'] = true;
   	header("location:login.php");
   	exit();
 
 ?>