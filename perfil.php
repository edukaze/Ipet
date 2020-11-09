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
    WHERE NOR_CODIGO = ?;
	/*LEFT JOIN IPET_USUARIOS_ONG ON ANI_ONG_ID = ONG_ID;*/
	");
$stmt->execute([$_SESSION['id_usuario']]);
$animais =  $stmt->fetchAll();

// var_dump($animais);

$rowTotal = $stmt->rowCount();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="css/edicao.css"/>
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
	<style type="text/css">
	a {
		color: black;
	}
	.ui.grid>.column:not(.row), .ui.grid>.row>.column{
		padding-right: 7rem;
		padding-left: 3rem;
	}
	h3{
		text-align: center;
	}

	</style>
</head>
<body>
	<!-- navbar -->
	<?php  include 'header-diminuido.php'; ?>

			<section class="titulo">
				<h1>MEU(S) PET(S)</h1>
			</section>

			<h3>Alterar informações do perfil <br><button class="ui inverted secondary button">
				<a href="alterar-perfil.php?id=<?= $_SESSION['id_usuario']?>">Alterar</a></button></h3>

	<section class="edc">
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
								Espécie: <?= $animal['ANI_ESPECIE']?> <br>
								Raça: <?= $animal['ANI_RAÇA']?> <br>
								Porte: <?= $animal['ANI_PORTE']?> | Gênero: <?= $animal['ANI_GENERO']?> <br>
							</div>
						</div>

							<div class="extra content">
								<div class="descriptin">
									Sobre o pet: <?= $animal['ANI_DESCRICAO']?>
								</div>
							</div>

								<div class="ui four column grid">
	 								<div class="row">
								 		<div class="column"><button class="ui red button" _msthash="1608854" _msttexthash="114907"><a href="delete.php?id=<?= $animal['ANI_CODIGO'] ?>">EXCLUIR</a></button></div>
								 		<div class="column"><button class="ui blue button" _msthash="1612989" _msttexthash="46332"><a href="edicao_animal.php?id=<?= $animal['ANI_CODIGO'] ?>">EDITAR</a></button></div>
									</div>
								</div>	
				</div><!-- .ui.card -->

		<?php endforeach; ?>
	<?php endif; ?>
	
	</div><!-- .ui.four -->
</section>

<?php include 'footer.php'; ?>
			
		<script type="text/javascript">
		// Deixa o header fixo no site
		window.addEventListener("scroll", function(){
			var header = document.querySelector("header");
			header.classList.toggle("sticky", window.scrollY > 0);
		})
		// Essa função é para o menu responsivo
		function toggle(){
			var header = document.querySelector("header");
			header.classList.toggle("active");
		}
	</script>

</body>
</html>