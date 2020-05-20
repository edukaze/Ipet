<?php 
session_start();
include ('conexao.php');

if(empty($_POST['t-usuario']) || empty($_POST['t-senha'])){
$_SESSION['erro-campo'] = true;
 header("location:login.php");
 exit();
 }
$usuario = mysqli_real_escape_string($conexao, $_POST['t-usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['t-senha']);

$query = "select nome from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";
$query_ong = "select nome_ong from ong where usuario = '{$usuario}' and senha = md5('{$senha}')"; 

$result = mysqli_query($conexao, $query);
$result_ong = mysqli_query($conexao, $query_ong);

$row = mysqli_num_rows($result);
$row_ong = mysqli_num_rows($result_ong);

if($row == 1 ){
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['nome'] = $usuario_bd['nome'];
	header("location:index.php");
	exit();
}
elseif($row_ong == 1 ){
	$usuario_bd = mysqli_fetch_assoc($result_ong);
	$_SESSION['nome_ong'] = $usuario_bd['nome_ong'];
	header("location:index.php");
	exit();
}
   else{
   	$_SESSION['nao-autenticado'] = true;
   	header("location:login.php");
   	exit();
	}


?>
