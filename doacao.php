<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro Animais</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/cadastro_doacao.css">
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
	
	<section>
		<div class="formario_login">
			<div class="conteiner-box">
				<div class="text-area">
					<div class="icone">
						<img src="img/iPettt.png" alt="">
					</div>
					<?php include 'condicional-cadastro.php'; ?>
					<div class="formulario2">
						<form action="validar_cadastro_animais.php" method="POST">
							<div class="fild">
								<div class="controle">
									<p><label for="nome-ani">Nome</label></p>
										<input type="text" name="a-nome" id="nome-ong" size="35" placeholder="Ex: Tobe">
								</div>
							</div>
							<div class="fild">
								<div class="controle">
									<p><label for="especie">Espécie</label></p>
									 	<input type="text" name="a-especie" id="cnpj" size="35" placeholder="Ex: Cão, gato, coelho">
									</div>
								</div>
							<div class="fild">
								<div class="controle">
									<p><label for="raca">Raça</label></p>
								 		<input type="text" name="a-raca"  size="35" placeholder="Ex: Pinscher">
								</div>
							</div>
							<div class="fild">
								<div class="controle">
									<p><label for="porte">Porte</label></p>
										<input type="text" name="a-porte"  size="35" placeholder="P | M | G">
								</div>
							</div>

							<div class="fild">
								<div class="controle">
									<p><label for="genero">Gênero</label></p>
										<input type="text" name="a-genero"  size="35" placeholder="F | M">
								</div>
							</div>

							<div class="fild">
								<div class="controle">
									<p><label for="descricao">Descrição</label></p>
										<input type="text" name="a-descricao" size="35" placeholder="Faça uma breve descrição do pet">
								</div>
							</div>

							<div class="botao">
								<input type="submit" value="Cadastrar">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="botao-volta">
		<a href="index.php">Voltar</a>
	</div>

	<script type="text/javascript">
		// Essa função é para o menu responsivo
		function toggle(){
			var header = document.querySelector("header");
			header.classList.toggle("active");
		}
	</script>
</body>
</html>