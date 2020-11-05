<?php session_start();

if (!isset($_SESSION['anonimo'])) {
	session_destroy();
	$_SESSION['anonimo'] = true;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadrastro ONG</title>
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

	function ipet(telefone){ 
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
				
				<form class="ui form" action="verificar_cadastro_ong.php" method="POST">
					<h4 class="ui dividing header">Cadastro ONG</h4>
					<br>

					<div class="field">
						<div class="ui left icon input">
							<i class="building icon"></i>
							<input type="text" name="o-nome-ong" id="nome-ong" placeholder="Digite o nome da ONG"
							value="<?= $_SESSION['cadastro_ongs']['o-nome-ong'] ?? '' ?>" required>
						</div>
					</div>

					<div class="field">
						<div class="two fields">
							<div class="field">
								<div class="required field">
									<label>CNPJ</label>
									<div class="ui left icon input">
										<i class="user icon"></i>
										<input type="text" name="o-cnpj" id="cnpj" placeholder="00.000.000/0000-00"
										value="<?= $_SESSION['cadastro_ongs']['o-cnpj'] ?? '' ?>" required>
									</div>
								</div>
							</div>
							<div class="field">
								<div class="required field">
									<label>Contato</label>
									<div class="ui left icon input">
										<i class="mobile alternate icon"></i>
										<input type="text" name="o-telefone" id="telefone" placeholder="(00) 00000-0000" onkeypress="ipet(this)" value="<?= $_SESSION['cadastro_ongs']['o-telefone'] ?? '' ?>" required>
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
								<input type="text" name="o-email" id="email" placeholder="minhaong@email.com"
								value="<?= $_SESSION['cadastro_ongs']['o-email'] ?? '' ?>" required>
							</div>
						</div>
					</div>

					<div class="field">
						<div class="two fields">
							<div class="field">
								<div class="required field">
									<label>Facebook</label>
									<div class="ui left icon input">
										<i class="facebook icon"></i>
										<input type="text" name="o-facebook" id="facebook" placeholder="facebook.com/minhaong"
										value="<?= $_SESSION['cadastro_ongs']['o-facebook'] ?? '' ?>" required>
									</div>
								</div>
							</div>
							<div class="field">
								<div class="required field">
									<label>Instagram</label>
									<div class="ui left icon input">
										<i class="instagram icon"></i>
										<input type="text" name="o-instagram" id="instagram" placeholder="instagram.com/minhaong"
										value="<?= $_SESSION['cadastro_ongs']['o-instagram'] ?? '' ?>" required>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="field">
						<div class="required field">
							<label>Usuário</label>
							<div class="ui left icon input">
								<i class="user icon"></i>
								<input type="text" name="o-usuario" id="usuario" placeholder="Digite um usuario"
								value="<?= $_SESSION['cadastro_ongs']['o-usuario'] ?? '' ?>" required>
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
										<input type="password" name="o-senha" id="senha" placeholder="Crie uma senha" required>
									</div>
								</div>
							</div>
							<div class="field">
								<div class="required field">
									<label>Confirmação</label>
									<div class="ui left icon input">
										<i class="lock icon"></i>
										<input type="password" name="o-conf-senha" id="conf_senha" placeholder="Confirme a senha" required>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="field">
						<div class="required field">
							<label>Descrição</label>
							<input type="text" name="o-descricao" id="descricao" placeholder="Faça uma breve descrição da sua ONG"
							value="<?= $_SESSION['cadastro_ongs']['o-descricao'] ?? '' ?>" required>
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