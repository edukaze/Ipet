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
	header("location:doacao.php");
	exit(); 
}
<<<<<<< HEAD

=======
>>>>>>> faa16c347711becaaba4bf4d1fe7a8eb31fbc163

$pdo = dbConnect();

if (isset($_SESSION['nome'])) {
$chaveUsu = $_SESSION['id_usuario'];
	
$stmt = $pdo->prepare("
    INSERT  INTO IPET_ANIMAIS (ANI_NOME, ANI_ESPECIE, ANI_RAÇA, ANI_PORTE, ANI_GENERO, ANI_DESCRICAO, ANI_NOR_CODIGO)
    VALUES (?, ?, ?, ?, ?, ?, ?);
");

$stmt->execute([$nome, $especie, $raca, $porte, $genero, $descricao, $chaveUsu]);
print_r($stmt->errorInfo());
header("location:adocao.php");
	}
	elseif (isset($_SESSION['nome_ong'])) {
$chaveOng = $_SESSION['id_ong'];
	
$stmt = $pdo->prepare("
    INSERT  INTO IPET_ANIMAIS (ANI_NOME, ANI_ESPECIE, ANI_RAÇA, ANI_PORTE, ANI_GENERO, ANI_DESCRICAO, ANI_ONG_ID)
    VALUES (?, ?, ?, ?, ?, ?, ?);
");

$stmt->execute([$nome, $especie, $raca, $porte, $genero, $descricao, $chaveOng]);
print_r($stmt->errorInfo());
header("location:adocao.php");
	}

?>
