<?php 
session_start();

if (isset($_SESSION['anonimo'])) {
	header("location:login.php");
}
elseif (isset($_SESSION['anonimo'])) {
	header("location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Adote</title>
	<link rel="stylesheet" type="text/css" href="css/cadastro_adocao.css"/>
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
</head>

<body>

	<!-- navbar -->
	<header id="header">
		<a href="index.php" class="logo"><img src="img/iPettt.png"></a>
		<ul>
			<li><a href="index.php" onclick="toggle()">Home</a></li>
			<li><a href="index.php#sobre"  onclick="toggle()">Sobre</a></li>
			<li><a href="index.php#serviços"  onclick="toggle()">serviços</a></li>
			<li><a href="index.php#pets"  onclick="toggle()">Pets</a></li>
			<li><a href="index.php#equipe"  onclick="toggle()">Equipe</a></li>
			<!-- <li><a href="#contato"  onclick="toggle()">Contato</a></li> -->
			<li><a href="adocao.php"  onclick="toggle()">Adoção</a></li>
			<li><a href="doacao.php"  onclick="toggle()">Doação</a></li>
			<li><a href="lista.php"  onclick="toggle()">Ongs</a></li>
			<?php if(isset($_SESSION['nome'])): ?>
				<li><a href="index.php"  onclick="toggle()" class="cadastro_user"><?php echo $_SESSION['nome'];?> </a>
					<ul>
						<li><a href="perfil.php "onclick="toggle()" class="cadastro_user">perfil</a></li>
						<li><a href="sair.php"  onclick="toggle()" class="cadastro_user">sair</a></li>
					</ul>
				</li>
				<?php elseif (isset($_SESSION['nome_ong'])): ?>
					<li><a href="index.php"  onclick="toggle()" class="cadastro_user"><?php echo $_SESSION['nome_ong']; ?></a>
						<ul>
							<li><a href="perfil_ong.php "onclick="toggle()" class="cadastro_user">perfil</a></li>

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

			<!-- banner -->
			<section class="banner" id="home">
				<div class="overlay">
					<!-- <h2><span>Atitude é uma pequena<br>coisa que faz uma grande diferença</span></h2> -->
				</div>
			</section>

			<section class="adc">
				<div class="box">
				</div>
			</section>

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

		function loadData() {
			console.log('fazendo requisição...');
			$.ajax('adocao-ajax.php', {
				success: function(data) {
					console.log('atualizando...');
					$('.box').html(data);
				}
			})
		}

		$(document).ready(function() {
			loadData();
		});

		setInterval(function() {
			loadData();
		}, 5 * 1000);
	</script>
</body>
</html>