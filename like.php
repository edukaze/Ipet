<?php 
session_start();
$get = $_GET['ani'];

include 'banco.php';
$pdo = dbConnect();


$verificar = $pdo->prepare("
	SELECT COUNT(*) AS TOTAL FROM IPET_LIKE
	WHERE LIK_ANI_CODIGO = ?;
	");
$verificar->execute([$get]);
$row = $verificar->fetchAll();


if (isset($_SESSION['id_usuario'])) {

	if ($row[0]['TOTAL'] == 0) {
	
	$stmt = $pdo->prepare("
		INSERT INTO IPET_LIKE(LIK_NOR_CODIGO , LIK_ANI_CODIGO)
		VALUES (?,?);
		");
	$stmt->execute([$_SESSION['id_usuario'], $get]);
	header('location:adocao.php');
	exit();
	}
}
elseif (isset($_SESSION['id_ong'])) {
	if ($row[0]['TOTAL'] == 0) {
	
	$stmt = $pdo->prepare("
		INSERT INTO IPET_LIKE(LIK_ONG_ID, LIK_ANI_CODIGO)
		VALUES (?,?);
		");
	$stmt->execute([$_SESSION['id_ong'], $get]);
	header('location:adocao.php');
	exit();
	}		
}
 if($row[0]['TOTAL'] == 1) {
$query = "DELETE FROM IPET_LIKE WHERE LIK_ANI_CODIGO=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$get]);
header('location:adocao.php');
exit();
}
