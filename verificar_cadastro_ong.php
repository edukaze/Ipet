<?php
include "banco.php";

$cnpj = $_POST['o-cnpj'];
$usuario = $_POST['o-usuario'];
$facebook = $_POST['o-facebook'];
$instagram = $_POST['o-instagram'];
$email = $_POST['o-email'];
$telefone = $_POST['o-telefone'];
$nome = $_POST['o-nome-ong'];
$senha = $_POST['o-senha'];
$descricao = $_POST['o-descricao'];

$pdo = dbConnect();

$stmt = $pdo->prepare("
    INSERT INTO ipet_usuarios_ong (ONG_CNPJ, ONG_USUARIO, ONG_FACEBOOK, ONG_INSTAGRAM, ONG_EMAIL, ONG_TELEFONE, ONG_NOME, ONG_SENHA, ONG_DESCRICAO)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->execute([$cnpj, $usuario, $facebook, $instagram, $email, $telefone, $nome, $senha, $descricao]);

header('location: cadastro_ongs.php');

?>