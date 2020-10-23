<?php
session_start();

include('banco.php');

$nome = $_POST['a-nome'];
$especie = $_POST['a-especie'];
$raca = $_POST['a-raca'];
$porte = $_POST['a-porte'];
$genero = $_POST['a-genero'];
$descricao = $_POST['a-descricao'];
include 'funcoes.php';

if (empty($nome) ||  empty($especie) || empty($raca) || empty($porte) || empty($genero) || empty($descricao)){
	$_SESSION['erro-campo'] = true;
	header("location:cadastro_animais.php");
	exit(); 
}
elseif (strlen($nome) > 20) {
	$_SESSION['erro-nome'] = true;
	header("location:cadastro_animais.php");
	exit();
}

elseif (validar($padrao_nome, $nome) === false) {
	$_SESSION['erro-nome'] = true;
	header("location:cadastro_animais.php");
	exit();
}

$pdo = dbConnect();

$stmt = $pdo->prepare("
    INSERT INTO IPET_ANIMAIS (ANI_NOME, ANI_ESPECIE, ANI_RAÇA, ANI_PORTE, ANI_GENERO, ANI_DESCRICAO)
    VALUES (?, ?, ?, ?, ?, ?)
");

$stmt->execute([$nome, $especie, $raca, $porte, $genero, $descricao]);

header('location: doacao.php');
var_dump($pdo);

?>