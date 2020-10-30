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
	SELECT * FROM IPET_ANIMAIS
	LEFT JOIN IPET_USUARIO_NORMAL ON ANI_NOR_CODIGO = NOR_CODIGO
	LEFT JOIN IPET_USUARIOS_ONG ON ANI_ONG_ID = ONG_ID;
	");

$stmt->execute();
$animais =  $stmt->fetchAll();

// var_dump($animais);

$rowTotal = $stmt->rowCount();


?>

<div class="box1">

	<?php if ($rowTotal > 0): ?>
		<?php foreach ($animais as  $animal): ?>
			<?php
			$imagem = 'imagens/1/bbb.jpeg';
			if (is_file("imagens/" .  $animal['ANI_CODIGO'] . "/" . $animal['ANI_IMAGEM'])) {
				$imagem = "imagens/" .  $animal['ANI_CODIGO'] . "/" . $animal['ANI_IMAGEM'];
			}
			?>

			<div class="box2">
				<dl>
					<dt>Nome</dt>
					<dd><?= $animal['ANI_NOME']?></dd>
					<dd><img src="<?= $imagem ?>"></dd>
					<dt>Chave Normal usu</dt>
					<dd><?= $animal['ANI_NOR_CODIGO']?></dd>
					<dt>Chave ong</dt>
					<dd><?= $animal['ANI_ONG_ID']?></dd>
					<dt>Espécie</dt>
					<dd><?= $animal['ANI_ESPECIE']?></dd>
					<dt>Raça</dt>
					<dd><?= $animal['ANI_RAÇA']?></dd>
					<dt>Porte</dt>
					<dd><?= $animal['ANI_PORTE']?></dd>
					<dt>Gênero</dt>
					<dd><?= $animal['ANI_GENERO']?></dd>
					<dt>Descrição</dt>
					<dd><?= $animal['ANI_DESCRICAO']?></dd>
				</dl>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>

</div>
