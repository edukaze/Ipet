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
	INSERT INTO IPET_USUARIOS_NORMAL (NOR_NOME, NOR_SOBRENOME, NOR_SENHA, NOR_USUARIO, NOR_CONTATO, NOR_EMAIL)
	VALUES (?, ?, ?, ?, ?, ?);
");

$stmt->execute([$nome, $sobrenome, $senha, $usuario, $contato, $email]);

header("location:cadastro_usuario.php");

?>