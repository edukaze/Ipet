<?php

include 'banco.php';

$nome = $_POST['u-nome'];
$sobrenome = $_POST['u-sobrenome'];
$usuario = $_POST['u-usuario'];
$email = $_POST['u-email'];
$senha = $_POST['u-senha'];
$contato = $_POST['u-contato'];

$pdo = dbConnect();

$stmt = $pdo->prepare("
	INSERT INTO IPET_USUARIOS (usu_nome, usu_sobrenome, usu_usuario, usu_email, usu_senha, usu_telefone, usu_tip_codigo)
	VALUES (?, ?, ?, ?, md5(?), ?, ?)
");

$stmt->execute([$nome, $sobrenome, $usuario, $email, $senha, $contato, 2]);

header('location:cadastro_usuario.php');

?>