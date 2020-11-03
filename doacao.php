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

?>

<!DOCTYPE html>
<html>
<head>
	<title>IPET</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/cadastro_doacao.css">
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<body>
	<!-- navbar -->
	<?php  include 'header-diminuido.php'; ?>

			<!-- <section class="banner-dc" id="home">
				<div class="overlay">
					<h2><span>Atitude é uma pequena<br>coisa que faz uma grande diferença</span></h2>
				</div>
			</section> -->

			<section  class="bg-color" style=" background-color: #F7F8F9;">
				<div class="container-fluid h-100">
					<div class="row form-cadastro justify-content-center p-4">
						<div class="col-md-3 align-self-center area-form">

							<div class="row justify-content-center mb-4">
							</div>
							<span class="small d-block text-center" style="font-size: 18px;">FAÇA SUA DOAÇÃO</span>

							<span class="small d-block text-center" style="font-size: 18px;">INSIRA OS DADOS DO PET</span>

							<?php include 'condicional-cadastro.php'; ?>

							<form action="validar_cadastro_animais.php" method="POST" enctype="multipart/form-data">
								<div class="input-group mt-2">
									<input type="text" class="form-control outline-secondary" name="a-nome" placeholder="Nome" value="<?= $_SESSION['cadastro_animal']['a-nome'] ?? '' ?>" required>
								</div>
								<div class="input-group mt-2">
									<?php
									$stmt = $pdo->prepare('SELECT * FROM IPET_ESPECIE order by ESP_ESPECIE');
									$stmt->execute();
									$especies = $stmt->fetchAll();

									?>
									<select name="a-especie" class="form-control outline-secondary">
										<?php foreach ($especies as $especie): ?>

											<option value="<?= $especie['ESP_ESPECIE']?>" 
												<?php if (($_SESSION['cadastro_animal']['a-especie'] ?? false) == $especie['ESP_ESPECIE']): ?>
													selected
												<?php endif ?>
												> <?= $especie['ESP_ESPECIE'] ?>
											</option>

										<?php endforeach ?>

										<!-- <option value="cachorro">Cachorro</option>
										<option value="gato">Gato</option>
										<option value="hamster">Hamister</option>
										<option value="passaro">Passáro</option>
										<option value="outro">Outro</option> -->
									</div>
									<div class="input-group mt-2">
										<input type="text" class="form-control outline-secondary" name="a-raca" placeholder="Raça" value="<?= $_SESSION['cadastro_animal']['a-raca'] ?? '' ?>" required>
									</div>
									<div class="input-group mt-2">
										<?php
										$stmt = $pdo->prepare('SELECT ANI_PORTE FROM IPET_ANIMAIS');
										$stmt->execute();
										$dados = $stmt->fetchAll();

										?>
										<select name="a-porte" class="form-control outline-secondary">
											<option value="p">P</option>
											<option value="m">M</option>
											<option value="g">G</option>
											<?php foreach ($dados as $porte): ?>

												<option value="<?= $porte['ANI_PORTE']?>" 
													<?php if (($_SESSION['cadastro_animal']['a-porte'] ?? false) == $porte['ANI_PORTE']): ?>
														selected
													<?php endif ?>
													> <?= $porte['ANI_PORTE'] ?>
												</option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="input-group mt-2">
										<?php
										$stmt = $pdo->prepare('SELECT ANI_GENERO FROM IPET_ANIMAIS');
										$stmt->execute();
										$dados = $stmt->fetchAll();

										?>
										<select name="a-genero" class="form-control outline-secondary">
											<option value="f">F</option>
											<option value="m">M</option>
											<?php foreach ($dados as $genero): ?>

												<option value="<?= $genero['ANI_GENERO']?>" 
													<?php if (($_SESSION['cadastro_animal']['a-genero'] ?? false) == $genero['ANI_GENERO']): ?>
														selected
													<?php endif ?>
													> <?= $genero['ANI_GENERO'] ?>
												</option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="input-group mt-2">
										<input type="file" class="form-control outline-secondary" name="imagem" placeholder="Imagem">
									</div>
									<div class="input-group mt-2">
										<textarea class="form-control outline-secondary" name="a-descricao" placeholder="Descrição" required></textarea>
									</div>

									<div class="row">
										<div class="col-md-6">
											<input type="submit" class="btn btn-info btn-block mt-2" value="Enviar">
										</div>
									</div>
								</form>
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