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
elseif(strlen($especie) > 20){
	$_SESSION['erro-especie'] = true;
	header("location:cadastro_animais.php");
	exit();
}
elseif(validar($padrao_especie,$especie) === false){
	$_SESSION['erro-especie'] = true;
	header("location:cadastro_animais.php");
	exit(); 
}
elseif(strlen($raca) > 20){
	$_SESSION['erro-raca'] = true;
	header("location:cadastro_animais.php");
	exit();
}
elseif (validar($padrao_raca,$raca) === false) {
	$_SESSION['erro-raca'] = true;
	header("location:cadastro_animais.php");
	exit();
}


elseif(strlen($porte) > 1){
	$_SESSION['erro-porte'] = true;
	header("location:cadastro_animais.php");
	exit();
}

elseif(strlen($porte != "P" || !="M" || !="G")){
	$_SESSION['erro-porte'] = true;
	header("location:cadastro_animais.php");
	exit();
}

elseif(strlen($genero != "M" || != "F")){
	$_SESSION['erro-genero'] = true;
	header("location:cadastro_animais.php");
	exit();
}

elseif(strlen($descricao) > 100){
	$_SESSION['erro-descricao'] = true;
	header("location:cadastro_animais.php");
	exit();
}


$pdo = dbConnect();

$stmt = $pdo->prepare("
    INSERT INTO IPET_ANIMAIS (ANI_NOME, ANI_ESPECIE, ANI_RAÇA, ANI_PORTE, ANI_GENERO, ANI_DESCRICAO)
    VALUES (?, ?, ?, ?, ?, ?)
");

$stmt->execute([$nome, $especie, $raca, $porte, $genero, $descricao]);

header('location: adocao.php');
var_dump($pdo);

?>
