<?php 
session_start();


if (!isset($_SESSION['anonimo'])) {
	session_destroy();
	$_SESSION['anonimo'] = true;
	header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
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
			background-image: url('/img/background.png');
			background-attachment: fixed;
			background-repeat: no-repeat;
			background-size: cover;
		}
		body > .grid {
			height: 100%;
		}
		.image {
			margin-top: -100px;
		}
		.column {
			max-width: 450px;
		}
	</style>
	<script>
		$(document)
		.ready(function() {
			$('.ui.form')
			.form({
				fields: {
					t-usuario: {
						identifier  : 't-usuario',
						rules: [
						{
							type   : 'empty',
							prompt : 'Please enter your user'
						},
						{
							type   : 'usuario',
							prompt : 'Please enter a valid user'
						}
						]
					},
					t-senha: {
						identifier  : 'senha',
						rules: [
						{
							type   : 'empty',
							prompt : 'Please enter your password'
						},
						{
							type   : 'length[8]',
							prompt : 'Your password must be at least 8 characters'
						}
						]
					}
				}
			})
			;
		})
		;
	</script>
</head>

<body>

	<div class="ui middle aligned center aligned grid">
		<div class="column">

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
					<?php elseif(isset($_SESSION['status_cadastro'])): ?>
						<div class="campo-certo">
							<p>Cadastro feito com sucesso!</p>
						</div>
						<?php unset($_SESSION['status_cadastro']) ?>
					<?php endif; ?>
					<h2 class="ui black image header">
						<img src="img/iPettt.png" class="image">
						<div class="content">
							Faça login na sua conta
						</div>
					</h2>

					<form class="ui large form" method="POST" action="verificar_login.php">
						<div class="ui stacked segment">
							<div class="field">
								<div class="ui left icon input">
									<i class="user icon"></i>
									<input type="text" name="t-usuario" placeholder="Usuário">
								</div>
							</div>
							<div class="field">
								<div class="ui left icon input">
									<i class="lock icon"></i>
									<input type="password" name="t-senha" placeholder="Senha">
								</div>
							</div>
							<input class="ui fluid large blue submit button" type="submit" value="Login"></div>
		
							<div class="ui error message"></div>

						</form>

						<div class="ui message">
							Não possui conta? Escolha sua forma de cadastro <br>
							<a href="cadastro_usuario.php">Usuário</a> ou
							<a href="cadastro_ongs.php">ONG</a> <br>
							<a href="index.php">Voltar</a>
						</div>
					</div>
	</div>

</body>
</html>