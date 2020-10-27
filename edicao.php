<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="css/edicao.css"/>
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<body>
	<!-- navbar -->
	<header id="header">
		<a href="" class="logo"><img src="img/iPettt.png"></a>
		<ul>
			<li><a href="index.php" onclick="toggle()">Home</a></li>
			<li><a href="index.php"  onclick="toggle()">Sobre</a></li>
			<li><a href="index.php"  onclick="toggle()">serviços</a></li>
			<li><a href="index.php"  onclick="toggle()">Pets</a></li>
			<li><a href="index.php"  onclick="toggle()">Equipe</a></li>
			<!-- <li><a href="#contato"  onclick="toggle()">Contato</a></li> -->
			<li><a href="adocao.php"  onclick="toggle()">Adoção</a></li>
			<li><a href="doacao.php"  onclick="toggle()">Doação</a></li>
			<li><a href="#"  onclick="toggle()">Ongs</a></li>
			<?php if(isset($_SESSION['nome'])): ?>
			<li><a href="index.php"  onclick="toggle()" class="cadastro_user"><?php echo $_SESSION['nome'];?> </a>
		<ul>
			<li><a href="sair.php"  onclick="toggle()" class="cadastro_user">sair</a></li>
		</ul>
			</li>
				<?php elseif (isset($_SESSION['nome_ong'])): ?>
				<li><a href="index.php"  onclick="toggle()" class="cadastro_user"><?php echo $_SESSION['nome_ong']; ?></a>
					<ul>
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

	<section class="titulo">
		<h1>MEU(S) PET(S)</h1>
	</section>


	<section class="edc">
		<div class="box">
			<div class="box1">
				<div class="box2">
					<dl>
						<dt>Chave Normal usu</dt>
                        <dd>sajbhsb</dd>
						<dt>Chave ong</dt>
                        <dd>gvgsvcgdsvgs</dd>
						<dt>Nome</dt>
                        <dd>gvhvghv</dd>
                        <dt>Espécie</dt>
                        <dd>bhvhvhvh</dd>
                        <dt>Raça</dt>
                        <dd>nk</dd>
                        <dt>Porte</dt>
                        <dd>gvhvhv</dd>
                        <dt>Gênero</dt>
                        <dd>vbhv</dd>
                        <dt>Descrição</dt>
                        <dd>b</dd>
					</dl>
					<a href="">Editar</a>
					<a href="" style="background: red;">Excluir</a>
				</div>
				<div class="box2">
					<dl>
						<dt>Chave Normal usu</dt>
                        <dd>sajbhsb</dd>
						<dt>Chave ong</dt>
                        <dd>gvgsvcgdsvgs</dd>
						<dt>Nome</dt>
                        <dd>gvhvghv</dd>
                        <dt>Espécie</dt>
                        <dd>bhvhvhvh</dd>
                        <dt>Raça</dt>
                        <dd>nk</dd>
                        <dt>Porte</dt>
                        <dd>gvhvhv</dd>
                        <dt>Gênero</dt>
                        <dd>vbhv</dd>
                        <dt>Descrição</dt>
                        <dd>b</dd>
					</dl>
					<a href="">Editar</a>
					<a href="" style="background: red;">Excluir</a>
				</div>
				<div class="box2">
					<dl>
						<dt>Chave Normal usu</dt>
                        <dd>sajbhsb</dd>
						<dt>Chave ong</dt>
                        <dd>gvgsvcgdsvgs</dd>
						<dt>Nome</dt>
                        <dd>gvhvghv</dd>
                        <dt>Espécie</dt>
                        <dd>bhvhvhvh</dd>
                        <dt>Raça</dt>
                        <dd>nk</dd>
                        <dt>Porte</dt>
                        <dd>gvhvhv</dd>
                        <dt>Gênero</dt>
                        <dd>vbhv</dd>
                        <dt>Descrição</dt>
                        <dd>b</dd>
					</dl>
					<a href="">Editar</a>
					<a href="" style="background: red;">Excluir</a>
				</div>
			</div>
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
	</script>
</body>
</html>