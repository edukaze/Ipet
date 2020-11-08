<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
	.normal {
		background-image: url(../img/like.ico);
		height: 32px;
		width: 32px;
		position: absolute;
	}
	.liked {
		position: absolute;
		background-image: url(../img/likecheio.ico);
		height: 32px;
		width: 32px;
	}
	.like-div {
		position: relative;
		margin: 0;
	}
	p{
		text-indent: 3em;
		padding-top: 7px;
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

<div class="ui four cards">

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

				<div class="ui card">
					<div class="image">
						<img src="<?= $imagem ?>">
					</div>

					<div class="extra content">
						<div class="like-div">
							
							<a href="like.php?ani=<?= $animal['ANI_CODIGO']?>" class="like <?= ($animal['LIK_ID'] != null) ? 'liked' : 'normal' ?>"></a> 
							<p><?= $likes['total'] ?></p>
						</div>
					</div>

					<div class="content">
						<div class="header"><?= $animal['ANI_NOME']?></div>
						<div class="summary">
							Responsável:
							<?php if ($animal['ANI_NOR_CODIGO'] != null): ?>
								<a href="perfil-usuario.php?id=<?= $animal['NOR_CODIGO'] ?>"><?= $animal['NOR_NOME']?></a>
								<?php elseif($animal['ANI_ONG_ID'] != null): ?>
									<a href="perfil-ong-geral.php?id=<?= $animal['ONG_ID'] ?>"><?= $animal['ONG_NOME']?></a>
								<?php endif ?>
							</div>
					</div>

						<div class="extra content">
							<div class="description">
								DESCRIÇÃO <br>
								Espécie: <?= $animal['ESP_ESPECIE']?> <br>
								Raça: <?= $animal['ANI_RAÇA']?> <br>
								Porte: <?= $animal['ANI_PORTE']?> | Gênero: <?= $animal['ANI_GENERO']?> <br>
							</div>
						</div>

							<div class="extra content">
								<div class="descriptin">
									Sobre o pet: <?= $animal['ANI_DESCRICAO']?>
								</div>
							</div>

				</div><!-- .ui.card -->

		<?php endforeach; ?>
	<?php endif; ?>

</div><!-- .ui.four -->

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