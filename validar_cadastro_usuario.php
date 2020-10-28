<?php
session_start();

if (!isset($_SESSION['anonimo'])) {
	session_destroy();
	header('location: index.php');
	
}
include 'banco.php';

$nome = $_POST['u-nome'];
$sobrenome = $_POST['u-sobrenome'];
$usuario = $_POST['u-usuario'];
$email = $_POST['u-email'];
$senha = $_POST['u-senha'];
$conf_senha = $_POST['u-conf-senha'];
$contato = $_POST['u-contato'];

$_SESSION['cadastro_usuario'] = $_POST;

include 'funcoes.php';

if (empty($nome) ||  empty($sobrenome) || empty($usuario) || empty($email) || empty($senha) || empty($conf_senha) || empty($contato)){
	$_SESSION['erro-campo'] = true;
	header("location:cadastro_usuario.php");
	exit();
}
elseif (validar($padrao_numero, $contato) === false) {
	$_SESSION['erro-contato'] = true;
	header("location:cadastro_usuario.php");
	exit();
}
elseif(validar($padrao_email,$email) === false){
	$_SESSION['erro-email'] = true;
	header("location:cadastro_usuario.php");
	exit(); 
}
elseif (strlen($nome) > 20) {
	$_SESSION['erro-nome'] = true;
	header("location:cadastro_usuario.php");
	exit();
}
elseif(validar($padrao_nome, $nome) === false){
	$_SESSION['erro-nome-char'] = true;
	header("location:cadastro_usuario.php");
	exit();
}
elseif(strlen($sobrenome) > 25){
	$_SESSION['erro-sobrenome'] = true;
	header("location:cadastro_usuario.php");
	exit();
}
elseif(validar($padao_sobrenome, $sobrenome) === false){
	$_SESSION['erro-sobrenome-char'] = true;
	header("location:cadastro_usuario.php");
	exit();
}
elseif(strlen($senha) < 8){
	$_SESSION['erro-senha'] = true;
	header("location:cadastro_usuario.php");
	exit();
}
elseif($senha != $conf_senha){
	$_SESSION['erro-conf-senha'] = true;
	header("location:cadastro_usuario.php");
	exit();
}

unset($_SESSION['cadastro_usuario']);

$pdo = dbConnect();

$verificandoExistencia = $pdo->prepare("
	SELECT COUNT(*) AS TOTAL FROM IPET_USUARIO_NORMAL
	WHERE NOR_USUARIO = ?;
	");
$verificandoExistencia->execute([$usuario]);
$row = $verificandoExistencia->fetchAll();


if($row[0]['TOTAL'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro_usuario.php');
	exit();
}
elseif ($row[0]['TOTAL']  == 0) {
	
	$stmt = $pdo->prepare("
		INSERT INTO IPET_USUARIO_NORMAL (NOR_NOME, NOR_SOBRENOME, NOR_SENHA, NOR_USUARIO, NOR_CONTATO, NOR_EMAIL)
		VALUES (?, ?, ?, ?, ?, ?);
		");
	$stmt->execute([$nome, $sobrenome, $senha, $usuario, $contato, $email]);

	$_SESSION['status_cadastro'] = true;
	header('Location: cadastro_usuario.php');
	exit;

}

?>