<?php 
session_start();

if (isset($_SESSION['anonimo'])) {
	header("location:login.php");
}
	elseif (isset($_SESSION['anonimo'])) {
	header("location:login.php");
}

include 'banco.php';
$pdo = dbConnect();

$stmt = $pdo->prepare("
	SELECT * FROM IPET_ANIMAIS;
	");
$stmt->execute();
$animais =  $stmt->fetchAll();

$rowTotal = $stmt->rowCount();


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Adote</title>
	<style type="text/css">
		
		.animais{
			border:1px solid black;
		}
	</style>
</head>
<body>

	<?php if ($rowTotal > 0): ?>
		<?php foreach ($animais as  $animal): ?>
			<div class="animais">
		<p><?= $animal['ANI_NOME']?></p>
		<p><?= $animal['ANI_ESPECIE']?></p>
		<p><?= $animal['ANI_RAÇA']?></p>
		<p><?= $animal['ANI_PORTE']?></p>
		<p><?= $animal['ANI_GENERO']?></p>
		<p><?= $animal['ANI_DESCRICAO']?></p>
			</div>
<?php endforeach; ?>
	<?php endif; ?>
</body>
</html>