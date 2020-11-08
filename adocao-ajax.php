<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
	.liked {
		background-image: url(../img/likecheio.ico);
		height: 30px;
		width: 30px;
		display: flex;
	}
	.normal {
		background-image: url(../img/like.ico);
		height: 30px;
		width: 30px;
		display: flex;
	}
</style>
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

if (isset($_SESSION['id_usuario'])) {
	$sql = "
		SELECT * FROM IPET_ANIMAIS
		LEFT JOIN IPET_USUARIO_NORMAL ON ANI_NOR_CODIGO = NOR_CODIGO
		LEFT JOIN IPET_USUARIOS_ONG ON ANI_ONG_ID = ONG_ID
		LEFT JOIN IPET_ESPECIE ON ESP_ID = ANI_ESP_ID
		LEFT JOIN IPET_LIKE ON LIK_ANI_CODIGO = ANI_CODIGO AND LIK_NOR_CODIGO = ?
	";
} else if (isset($_SESSION['id_ong'])) {
	$sql = "
		SELECT * FROM IPET_ANIMAIS
		LEFT JOIN IPET_USUARIO_NORMAL ON ANI_NOR_CODIGO = NOR_CODIGO
		LEFT JOIN IPET_USUARIOS_ONG ON ANI_ONG_ID = ONG_ID
		LEFT JOIN IPET_ESPECIE ON ESP_ID = ANI_ESP_ID
		LEFT JOIN IPET_LIKE ON LIK_ANI_CODIGO = ANI_CODIGO AND LIK_ONG_ID = ?
	";
}

$stmt = $pdo->prepare($sql);

$stmt->execute([$_SESSION['id_usuario'] ?? $_SESSION['id_ong'] ?? 0]);
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
			$stmt2 = $pdo->prepare("SELECT COUNT(*) AS total FROM IPET_LIKE WHERE LIK_ANI_CODIGO = ?");

			$stmt2->execute([$animal['ANI_CODIGO']]);
			$likes =  $stmt2->fetch();
			?>
			<div class="ui centered grid">
				<div class="computer only row">
			<div class="box2">
				<div class="column"><dl>
					<dt>Nome</dt>
					<dd><?= $animal['ANI_NOME']?></dd>
					<dd><img src="<?= $imagem ?>"></dd>
				</div>
				 <div class="six wide tablet eight wide computer column">
					<dt>Responsável</dt>
					<?php if ($animal['ANI_NOR_CODIGO'] != null): ?>
						<dd><a href="perfil-usuario.php?id=<?= $animal['NOR_CODIGO'] ?>"><?= $animal['NOR_NOME']?></a></dd>
					<?php elseif($animal['ANI_ONG_ID'] != null): ?>
						<dd><a href="perfil-ong-geral.php?id=<?= $animal['ONG_ID'] ?>"><?= $animal['ONG_NOME']?></a></dd>
					<?php endif ?>
						<div class="six wide tablet eight wide computer column">
					<dt>Espécie</dt>
					<dd><?= $animal['ESP_ESPECIE']?></dd>
						</div>
					<dt>Raça</dt>
					<dd><?= $animal['ANI_RAÇA']?></dd>
					<dt>Porte</dt>
					<dd><?= $animal['ANI_PORTE']?></dd>
					<dt>Gênero</dt>
					<dd><?= $animal['ANI_GENERO']?></dd>
					<dt>Descrição</dt>
					<dd><?= $animal['ANI_DESCRICAO']?></dd>

					<dd>
						<div class="like-div">
							<?= $likes['total'] ?> like<?= $likes['total'] > 1 ? 's' : '' ?>

							<a href="like.php?ani=<?= $animal['ANI_CODIGO']?>" class="like <?= ($animal['LIK_ID'] != null) ? 'liked' : 'normal' ?>"></a>
							</div>
					</dd>
				</dl>
			</div>
		</div>
		<?php endforeach; ?>
	<?php endif; ?>

</div>
<script type="text/javascript">

	$(document).on('click', 'a.like', function(evt){
		evt.preventDefault();
		console.log('like')
		var href = $(evt.target).attr('href');
		$.ajax(href, {
			success: function(data){
				// $('a.like').a(data);
				$(evt.target).parents('.like-div').html(data);

			}
		})
	});



</script>
