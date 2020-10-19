<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<body>
<section class="formulario">
	<div class="formario_login">
		<div class="conteiner-box">
			<div class="text-area">
				<div class="icone">
					<img src="img/iPettt.png" alt="">
				</div>
				<?php if(isset($_SESSION['erro-campo'])): ?>
					<div class="erro-campo">
						<p>Por favor preenchar todos os campos.</p>
					</div>
				<?php unset($_SESSION['erro-campo']); ?>
				<?php elseif(isset($_SESSION['nao-autenticado'])): ?>
					<div class="erro-campo">
						<p>ERROR: Usuário ou senha inválidos.</p>
					</div>
				<?php unset($_SESSION['nao-autenticado']); ?>
				<?php endif; ?>
				<div class="formulario1">
				<form method="POST" action="verificar_login.php">
					<div class="fild">
						<div class="controle">
							<label for="usuario">Usuário: </label>
							<input type="usuario" name="t-usuario" id="usuario" size="20" placeholder="Digite o seu usuario"></p>
						</div>
					</div>
					<div class="fild">
						<div class="controle">
							<label for="Senha">Senha: </label>
							<input type="password" name="t-senha" id="senha" size="20" placeholder="Digite o sua  senha"></p>
						</div>
					</div>
					<div class="botao">
						<input type="submit" value="Login">
					</div>
	
	
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="bg">
	<div class="cadastro-escolha">
		<p>
			Não possui conta?<br>
			Escolha sua forma de cadastro
		</p>
		<div class="botoes-escolha">
			<div class="botao1">
				<a href="cadastro_usuario.php">USUÁRIO</a>
			</div>
			<div class="botao1">
				<a href="cadastro_ongs.php">ONG</a>
			</div>
		</div>
	</div>
</section>
</body>
</html>