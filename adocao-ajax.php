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
	.ui.card {
		box-shadow: 13px 13px 20px #cbced1;
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

<!-- <div class="box1"> -->

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

		<div class="ui four column grid">
			<div class="row">

				<div class="ui card">
					<div class="image">
						<img src="<?= $imagem ?>">
					</div>

					<div class="extra content">
						<span class="left floated like">
							<i class="like icon"></i>
							Like
						</span>
						<span class="right floated star">
							<i class="star icon"></i>
							Favorite
						</span>
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
								Sobre o pet: <?= $animal['ANI_DESCRICAO']?>

							</div>
						</div>

						<div class="extra content">
							<div class="like-div">
								<?= $likes['total'] ?> like<?= $likes['total'] > 1 ? 's' : '' ?>
								<a href="like.php?ani=<?= $animal['ANI_CODIGO']?>" class="like <?= ($animal['LIK_ID'] != null) ? 'liked' : 'normal' ?>"></a>
							</div>
						</div>

				</div><!-- .ui.card -->
			</div><!-- .row -->
		</div><!-- .ui four column grid -->

		<?php endforeach; ?>
	<?php endif; ?>

<!-- </div>.box -->

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