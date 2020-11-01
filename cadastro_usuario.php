<?php session_start();

if (!isset($_SESSION['anonimo'])) {
	session_destroy();
	$_SESSION['anonimo'] = true;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadrastro Usuário</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/cadastro_usuario.css">
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<script type="text/javascript">
	function ipet(contato){ 
		if(contato.value.length == 0)
			contato.value = '(' + contato.value; 

		if(contato.value.length == 3)
			contato.value = contato.value + ') ';

		if(contato.value.length == 10)
			contato.value = contato.value + '-'; 
		
	}
</script>
<body>
	<section>
		<div class="formario_login">
			<div class="conteiner-box">
				<div class="text-area">
					<div class="icone">
						<img src="img/iPettt.png" alt="">
					</div>
					<?php include 'condicional-cadastro.php'; ?>
					<div class="formulario1">
						<form action="validar_cadastro_usuario.php" method="POST">
							<div class="fild">
								<div class="controle">
									<p><label for="nome">Nome </label></p>
									<input type="text" name="u-nome" id="nome" placeholder="Digite seu primeiro nome" value="<?= $_SESSION['cadastro_usuario']['u-nome'] ?? '' ?>" required>
								</div>
							</div>

							<div class="fild">
								<div class="controle">
									<p><label for="sobrenome">Sobrenome </label></p>
									<input type="text" name="u-sobrenome" id="sobrenome" placeholder="Digite seu sobrenome" value="<?= $_SESSION['cadastro_usuario']['u-sobrenome'] ?? '' ?>" required>
								</div>
							</div>

							<div class="fild">
								<div class="controle">
									<p><label for="usuario"> Usuário </label></p>
									<input type="text" name="u-usuario" id="usuario" placeholder="Digite um usuário" value="<?= $_SESSION['cadastro_usuario']['u-usuario'] ?? '' ?>" required>
								</div>
							</div>

							<div class="fild">
								<div class="controle">	
									<p><label for="email">Email </label> </p>
									<input type="email" name="u-email" id="email" placeholder="Digite seu email" value="<?= $_SESSION['cadastro_usuario']['u-email'] ?? '' ?>" required>
								</div>
							</div>

							<div class="fild">
								<div class="controle">	
									<p><label for="senha">Senha </label></p>
									<input type="password" name="u-senha" id="senha" placeholder="Digite uma senha" required>
								</div>
							</div>

							<div class="fild">
								<div class="controle">
									<p><label for="conf_senha">Confirme a senha </label></p>
									<input type="password" name="u-conf-senha" id="conf_senha" placeholder="Digite novamente a senha" required> 
								</div>
							</div>
							<div class="fild">
								<div class="controle">	
									<p><label for="contato">Contato </label></p>
									<input type="tel" name="u-contato" id="contato" placeholder="(00) 0 0000-0000" onkeypress="ipet(this)" value="<?= $_SESSION['cadastro_usuario']['u-contato'] ?? '' ?>" required>
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
			<br>
			<a href="login.php">Fazer login</a>
		</div>
	</section>
</body>
</html>
