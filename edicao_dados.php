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
$query = "SELECT * FROM IPET_ANIMAIS WHERE ANI_CODIGO";

$stmt = $pdo->prepare($query);

$stmt->execute();
$animais =  $stmt->fetchAll();


 //var_dump($animais);
$_SESSION['ani_codi'] = $animais[0]['ANI_CODIGO'];
var_dump($_SESSION['ani_codi']);

$query = "UPDATE IPET_ANIMAIS SET ANI_NOME=?, ANI_ESPECIE=?, ANI_RACA=?, ANI_PORTE=?, ANI_GENERO=?, ANI_DESCRICAO=? WHERE ANI_CODIGO=?";

$stmt = $pdo->prepare($query);

$stmt->execute([$nome, $especie, $raca, $porte, $genero, $descricao, $_SESSION['ani_codi']]);

print_r($stmt->errorInfo());
header('location:adocao.php');

?>