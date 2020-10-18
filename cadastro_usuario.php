<?php session_start();
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadratro Usuário</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/cadastro.css">
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<body>
<section>
	<div class="formario_login">
		<div class="conteiner-box">
			<div class="text-area">
				<div class="icone">
					<h1>Cadastro Usuário</h1><img src="img/iPettt.png" alt="">
				</div>
				<?php include 'condicional-cadastro.php'; ?>
		<div class="formulario1">
	<form action="validar_cadastro_usuario.php" method="POST">
		<div class="fild">
			<div class="controle">
			<p><label for="nome">&nbsp;&nbsp;&nbsp;Nome: </label>
				<input type="text" name="u-nome" id="nome" size="20" placeholder="Digite seu primeiro nome"></p>
			</div>
		</div>

		<div class="fild">
			<div class="controle">
			<p><label for="sobrenome">Sobrenome: </label>
				<input type="text" name="u-sobrenome" id="sobrenome" size="20" placeholder="Digite  o seu sobrenome"></p>
			</div>
		</div>

		<div class="fild">
			<div class="controle">
			<p><label for="usuario"> &nbsp;&nbsp;Usuário: </label>
				<input type="text" name="u-usuario" id="usuario" size="20" placeholder="Digite  o seu usuario"></p>
			</div>
		</div>

		<div class="fild">
			<div class="controle">	
			<p><label for="email">&nbsp;&nbsp;&nbsp;Email: </label> 
				<input type="email" name="u-email" id="email" size="20" placeholder="Digite o seu email"></p>
			</div>
		</div>

		<div class="fild">
			<div class="controle">	
			<p><label for="senha">&nbsp;&nbsp;Senha: </label>
				<input type="password" name="u-senha" id="senha" size="20" placeholder="Digite uma senha"></p>
			</div>
		</div>

		<div class="fild">
			<div class="controle">
			<p><label for="conf_senha">Conf senha: </label>
				<input type="password" name="u-conf-senha" id="conf_senha" size="20" placeholder="Digite novamente a senha"></p>
			</div>
		</div>
		<div class="fild">
			<div class="controle">	
			<p><label for="contato">&nbsp;&nbsp;Contato: </label>
				<input type="tel" name="u-contato" id="contato" size="20" placeholder="(00) 0 0000-0000"></p>
			</div>
		</div>

				<div class="botao">	
				<input type="submit" value="Cadastrar">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</section>
<section>
	<div class="botao-volta">
	<p><a href="login.php">LOGIN</a></p>
	</div>
</section>
</body>
</html>
