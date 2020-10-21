<?php

include('banco.php');

$nome = $_POST['a-nome'];
$especie = $_POST['a-especie'];
$raca = $_POST['a-raca'];
$porte = $_POST['a-porte'];
$genero = $_POST['a-genero'];
$descricao = $_POST['a-descricao'];

$pdo = dbConnect();

$stmt = $pdo->prepare("
    INSERT INTO IPET_ANIMAIS (ANI_NOME, ANI_ESPECIE, ANI_RAÇA, ANI_PORTE, ANI_GENERO, ANI_DESCRICAO)
    VALUES (?, ?, ?, ?, ?, ?)
");

$stmt->execute([$nome, $especie, $raca, $porte, $genero, $descricao]);

header('location: doacao.php');
var_dump($pdo);

?>