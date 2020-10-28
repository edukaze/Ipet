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
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!-- navbar -->
	<header id="header">
		<a href="" class="logo"><img src="img/iPettt.png"></a>
		<ul>
			<li><a href="#home" onclick="toggle()">Home</a></li>
			<li><a href="#sobre"  onclick="toggle()">Sobre</a></li>
			<li><a href="#serviços"  onclick="toggle()">serviços</a></li>
			<li><a href="#pets"  onclick="toggle()">Pets</a></li>
			<li><a href="#equipe"  onclick="toggle()">Equipe</a></li>
			<!-- <li><a href="#contato"  onclick="toggle()">Contato</a></li> -->
			<li><a href="adocao.php"  onclick="toggle()">Adoção</a></li>
			<li><a href="doacao.php"  onclick="toggle()">Doação</a></li>
			<li><a href="#"  onclick="toggle()">Ongs</a></li>
			<?php if(isset($_SESSION['nome'])): ?>
				<li><a href="index.php"  onclick="toggle()" class="cadastro_user"><?php echo $_SESSION['nome'];?> </a>
					<ul>
						<li><a href="edicao.php "onclick="toggle()" class="cadastro_user">perfil</a></li>
						<li><a href="sair.php"  onclick="toggle()" class="cadastro_user">sair</a></li>
					</ul>
				</li>
				<?php elseif (isset($_SESSION['nome_ong'])): ?>
					<li><a href="edicao_animal.php"  onclick="toggle()" class="cadastro_user"><?php echo $_SESSION['nome_ong']; ?></a>
						<ul>
							<li><a href="edicao_animal.php "onclick="toggle()" class="cadastro_user">perfil</a></li>
							
							<li><a href="sair.php"  onclick="toggle()" class="cadastro_user">sair</a></li>
						</ul>
					</li>
					<?php else: ?>
						<?php unset($_SESSION['nome']); ?>
						<?php unset($_SESSION['nome_ong']); ?>
						<li><a href="login.php"  onclick="toggle()" class="cadastro">cadastro</a></li>
					<?php endif ?>
				</ul>
				<div class="toggle" onclick="toggle()"></div>
			</header>

			<section class="banner-dc" id="home">
				<div class="overlay">
					<!-- <h2><span>Atitude é uma pequena<br>coisa que faz uma grande diferença</span></h2> -->
				</div>
			</section>

			<section  class="bg-color" style=" background-color: #F7F8F9;">
				<div class="container-fluid h-100">
					<div class="row form-cadastro justify-content-center p-4">
						<div class="col-md-3 align-self-center area-form">

							<div class="row justify-content-center mb-4">
							</div>
							<span class="small d-block text-center" style="font-size: 20px;">Faça sua Doação</span>

							<span class="small d-block text-center" style="font-size: 20px;">Insira os dados do Pet</span>

							<?php include 'condicional-cadastro.php'; ?>

							<form action="validar_cadastro_animais.php" method="POST" enctype="multipart/form-data">
								<div class="input-group mt-2">
									<input type="text" class="form-control outline-secondary" name="a-nome" placeholder="Nome">
								</div>
								<div class="input-group mt-2">
									<?php
									$stmt = $pdo->prepare('select * from IPET_ESPECIE order by ESPECIE');
									$stmt->execute();
									$especies = $stmt->fetchAll();
									?>
									<select name="a-especie" class="form-control outline-secondary" >
										<?php foreach ($especies as $especie): ?>
											<option value="<?= $especie['ESP_ID'] ?>"><?= $especie['ESPECIE'] ?></option>
										<?php endforeach ?>
										<!-- <option value="cachorro">Cachorro</option>
										<option value="gato">Gato</option>
										<option value="hamster">Hamister</option>
										<option value="passaro">Passáro</option>
										<option value="outro">Outro</option> -->
									</div>
									<div class="input-group mt-2">
										<input type="text" class="form-control outline-secondary" name="a-raca" placeholder="Raça">
									</div>
									<div class="input-group mt-2">
										<select name="a-porte" class="form-control outline-secondary" >
											<option value="p">P</option>
											<option value="m">M</option>
											<option value="g">G</option>
										</select>
									</div>
									<div class="input-group mt-2">
										<select name="a-genero" class="form-control outline-secondary" >
											<option value="f">F</option>
											<option value="m">M</option>
										</select>
									</div>
									<div class="input-group mt-2">
										<input type="file" class="form-control outline-secondary" name="imagem" placeholder="Imagem">
									</div>
									<div class="input-group mt-2">
										<textarea class="form-control outline-secondary" name="a-descricao" placeholder="Descrição"></textarea>
									</div>

									<div class="row">
										<div class="col-md-6">
											<input type="submit" class="btn btn-info btn-block mt-2" value="Enviar" >
										</div>
									</div>
								</form>
							</section>

							<footer class="footer-dc">
								<p>Igarassu-PE</p>
								<a href="https://github.com/edukaze/iPET" target="_black"><i class="fab fa-github"></i></a>
								<a href="https://drive.google.com/file/d/1QKOJcK75IwQ1ZFMn5FM0Eh-Dvjp1L7PK/view?usp=sharing" class="pdf" target="_black"><i class="far fa-file-pdf"></i></a>
							</footer>

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