<?php  
session_start();
include 'banco.php';

$nome = $_POST['a-nome'];
$especie = $_POST['a-especie'];
$raca = $_POST['a-raca'];
$porte = $_POST['a-porte'];
$genero = $_POST['a-genero'];
$descricao = $_POST['a-descricao'];

$pdo = dbConnect();
$query = "SELECT * FROM IPET_ANIMAIS LEFT JOIN IPET_USUARIOS_ONG ON ANI_ONG_ID = ONG_ID;";

$stmt = $pdo->prepare($query);

$stmt->execute();
$chaveAni = $stmt->fetchAll();

$_SESSION['ani-codigo'] = $chaveAni[0]['ANI_CODIGO'];
$_SESSION['ani-nome'] = $chaveAni[0]['ANI_NOME'];

var_dump($chaveAni);


$query = "UPDATE IPET_ANIMAIS SET ANI_NOME=?, ANI_ESPECIE=?, ANI_RAÇA=?, ANI_PORTE=?, ANI_GENERO=?, ANI_DESCRICAO=? WHERE ANI_CODIGO=? AND ANI_NOME=?";

$stmt = $pdo->prepare($query);

$stmt->execute([$nome, $especie, $raca, $porte, $genero, $descricao, $_SESSION['ani-codigo'], $_SESSION['ani-nome']]);

unset($_SESSION['ani-codigo']);
//print_r($stmt->errorInfo());
header('location:adocao.php');

?>