<?php
session_start();

if (!isset($_SESSION['anonimo'])) {
	session_destroy();
	header('location: cadastro_ongs');
}
include 'banco.php';

$nomeong = $_POST['o-nome-ong'];
$cnpj = $_POST['o-cnpj'];
$usuario = $_POST['o-usuario'];
$facebook = $_POST['o-facebook'];
$instagram = $_POST['o-instagram'];
$email= $_POST['o-email'];
$senha = $_POST['o-senha'];
$conf_senha = $_POST['o-conf-senha'];
$telefone = $_POST['o-telefone'];
$descricao = $_POST['o-descricao'];

$_SESSION['cadastro_ongs'] = $_POST;

include 'funcoes.php';

if (empty($nomeong)|| empty($cnpj) || empty($usuario) || empty($facebook) || empty($instagram) || empty($email) || empty($senha) || empty($conf_senha) || empty($telefone)||empty($descricao)) {
	$_SESSION['erro-campo'] = true;
	header("location:cadastro_ongs.php");
	exit(); 

}
elseif (strlen($cnpj) < 14){
	$_SESSION['error-cnpj'] = true;
	header("location:cadastro_ongs.php");
}
elseif (validar($padrao_numero, $telefone) === false) {
	$_SESSION['erro-contato'] = true;
	header("location:cadastro_ongs.php");
	exit();
}
elseif(validar($padrao_email,$email) === false){
	$_SESSION['erro-email'] = true;
	header("location:cadastro_ongs.php");
	exit(); 
}
elseif(validar($padrao_nome_ong, $nomeong) === false){
	$_SESSION['erro-nome-ong'] = true;
	header("location:cadastro_ongs.php");
	exit();
}
elseif(validar($padrao_facebook, $facebook) === false){
	$_SESSION['erro-facebook'] = true;
	header("location:cadastro_ongs.php");
	exit();
}
elseif(validar($padrao_instagram,$instagram) === false){
	$_SESSION['erro-instagram'] = true;
	header("location:cadastro_ongs.php");
	exit();
}
elseif(strlen($senha) < 8){
	$_SESSION['erro-senha'] = true;
	header("location:cadastro_ongs.php");
	exit();
}
elseif($senha != $conf_senha){
	$_SESSION['erro-conf-senha'] = true;
	header("location:cadastro_ongs.php");
	exit();
}

unset($_SESSION['cadastro_ongs']);

$pdo = dbConnect();

$verificandoExistencia = $pdo->prepare("
	SELECT COUNT(*) AS TOTAL FROM IPET_USUARIO_ONG
	WHERE ONG_USUARIO = ?;
	");

$verificandoExistencia->execute([$usuario]);
$row = $verificandoExistencia->fetchAll();


if($row[0]['TOTAL'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro_ongs.php');
	exit();
}
elseif ($row[0]['TOTAL']  == 0) {
	
	$stmt = $pdo->prepare("
		INSERT INTO IPET_USUARIOS_ONG (ONG_CNPJ, ONG_USUARIO, ONG_FACEBOOK, ONG_INSTAGRAM, ONG_EMAIL, ONG_TELEFONE, ONG_NOME, ONG_SENHA,ONG_DESCRICAO)
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);
		");
	$stmt->execute([$cnpj, $usuario, $facebook, $instagram, $email, $telefone, $nomeong, $senha, $descricao]);

	$_SESSION['status_cadastro'] = true;
	header('location: cadastro_ongs.php');

	exit();

}

?>