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
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">	

	<script src="assets/library/jquery.min.js"></script>
	<script src="../dist/components/form.js"></script>
	<script src="../dist/components/transition.js"></script>	

	<style type="text/css">
		body {
			background-image: url('/img/form-background.png');
			background-attachment: fixed;
			background-repeat: no-repeat;
			background-size: cover;
		}
		body > .grid {
			height: 100%;
		}
		.column {
			max-width: 600px;
		}
	</style>
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

	<div class="ui middle aligned center aligned grid">
		<div class="column">

			<?php include 'condicional-cadastro.php'; ?>

			<div class="ui message">
				
				<form class="ui form" action="validar_cadastro_usuario.php" method="POST">
					<h4 class="ui dividing header">Cadastro Usuário</h4>
					<br>

					<div class="field">
						<div class="two fields">
							<div class="field">
								<div class="required field">
									<label>Nome</label>
									<div class="ui left icon input">
										<i class="user outline icon"></i>
										<input type="text" name="u-nome" placeholder="Primeiro nome"
										value="<?= $_SESSION['cadastro_usuario']['u-nome'] ?? '' ?>" required>
									</div>
								</div>
							</div>
							<div class="field">
								<div class="required field">
									<label>Sobrenome</label>
									<div class="ui left icon input">
										<i class="user outline icon"></i>
										<input type="text" name="u-sobrenome" placeholder="Sobrenome"
										value="<?= $_SESSION['cadastro_usuario']['u-sobrenome'] ?? '' ?>" required>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="field">
						<div class="required field">
							<label>Email</label>
							<div class="ui left icon input">
								<i class="envelope icon"></i>
								<input type="email" name="u-email" placeholder="Email"
								value="<?= $_SESSION['cadastro_usuario']['u-email'] ?? '' ?>" required>
							</div>
						</div>
					</div>

					<div class="field">
						<div class="two fields">
							<div class="field">
								<div class="required field">
									<label>Usuário</label>
									<div class="ui left icon input">
										<i class="user icon"></i>
										<input type="text" name="u-usuario" placeholder="Crie um usuário"
										value="<?= $_SESSION['cadastro_usuario']['u-usuario'] ?? '' ?>" required>
									</div>
								</div>
							</div>
							<div class="field">
								<div class="required field">
									<label>Contato</label>
									<div class="ui left icon input">
										<i class="mobile alternate icon"></i>
										<input type="tel" name="u-contato" id="contato" placeholder="(00) 0 0000-0000"
										onkeypress="ipet(this)" value="<?= $_SESSION['cadastro_usuario']['u-contato'] ?? '' ?>" required>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="field">
						<div class="two fields">
							<div class="field">
								<div class="required field">
									<label>Senha</label>
									<div class="ui left icon input">
										<i class="lock icon"></i>
										<input type="password" name="u-senha" placeholder="Crie uma senha"
										required>
									</div>
								</div>
							</div>
							<div class="field">
								<div class="required field">
									<label>Confirmação</label>
									<div class="ui left icon input">
										<i class="lock icon"></i>
										<input type="password" name="u-conf-senha" id="conf_senha" placeholder="Confirme a senha" required>
									</div>
								</div>
							</div>
						</div>
					</div>

					<input class="ui fluid large blue submit button" type="submit" value="Cadastrar"></div>

					<a href="login.php">Voltar</a>

				</form>

			</div>
		</div>
	</div>

</body>
</html>