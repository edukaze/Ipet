<?php  
session_start();
include 'banco.php';

$nome = $_POST['a-nome'];
$especie = $_POST['a-especie'];
$raca = $_POST['a-raca'];
$porte = $_POST['a-porte'];
$genero = $_POST['a-genero'];
$descricao = $_POST['a-descricao'];
$nome_imagem = $_FILES['imagem']['name'];

$pdo = dbConnect();
if (isset($_SESSION['id_usuario'])) {
	
$query = "SELECT * FROM IPET_ANIMAIS  WHERE ANI_CODIGO = ?;";

$stmt = $pdo->prepare($query);

$stmt->execute([$_SESSION['id-animal']]);
$chaveAni = $stmt->fetchAll();
//var_dump($chaveAni);

$codigoAni = $chaveAni[0]['ANI_CODIGO'];
var_dump($codigoAni);
$_SESSION['ani-nome'] = $chaveAni[0]['ANI_NOME'];

$query = "UPDATE IPET_ANIMAIS SET ANI_NOME=?, ANI_ESPECIE=?, ANI_RAÇA=?, ANI_PORTE=?, ANI_GENERO=?, ANI_DESCRICAO=?, ANI_IMAGEM =? WHERE ANI_CODIGO=?";

$stmt = $pdo->prepare($query);

$stmt->execute([$nome, $especie, $raca, $porte, $genero, $descricao,$nome_imagem, $codigoAni]);
$ultimo_id =$codigoAni;

unlink('imagens/'.$ultimo_id);
//var_dump($ultimo_id);
include 'validar_imagem.php';
//var_dump($stmt);

//print_r($stmt->errorInfo());

header('location:perfil.php');
}
elseif (isset($_SESSION['id_ong'])){

	$query = "SELECT * FROM IPET_ANIMAIS  WHERE ANI_CODIGO= ?;";

$stmt = $pdo->prepare($query);

$stmt->execute([$_SESSION['id-animal']]);
$chaveAni = $stmt->fetchAll();


$codigoAni = $chaveAni[0]['ANI_CODIGO'];
var_dump($codigoAni);
$_SESSION['ani-nome'] = $chaveAni[0]['ANI_NOME'];

$query = "UPDATE IPET_ANIMAIS SET ANI_NOME=?, ANI_ESPECIE=?, ANI_RAÇA=?, ANI_PORTE=?, ANI_GENERO=?, ANI_DESCRICAO=?, ANI_IMAGEM =? WHERE ANI_CODIGO=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$nome, $especie, $raca, $porte, $genero, $descricao,$nome_imagem, $codigoAni]);
$ultimo_id =$codigoAni;


unlink('imagens/'.$ultimo_id.'/');

include 'validar_imagem.php';
//var_dump($stmt);
print_r($stmt->errorInfo());

header('location:perfil_ong.php');
}
unset($_SESSION['cadastro_animal']);

?>