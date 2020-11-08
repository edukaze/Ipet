<?php 
session_start();
include 'banco.php';

$pdo = dbConnect();
$stmt = $pdo->prepare("
	SELECT ONG_ID, ONG_USUARIO, ONG_TELEFONE, ONG_EMAIL, ONG_INSTAGRAM, ONG_FACEBOOK FROM IPET_USUARIOS_ONG
	WHERE ONG_ID = ?;
	");
$stmt->execute([$_SESSION['id_ong']]); 


$usuario = $stmt->fetchAll();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Edição Perfil</title>
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

</head>
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
	.image {
		margin-top: -100px;
	}
	.column {
		max-width: 450px;
	}
</style>
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
			<?php if(isset($_SESSION['upadate'])): ?>
				<div class="campo-certo">
					<p>Alterações feitas com sucesso</p>
				</div>
				<?php unset($_SESSION['upadate']) ?>
			<?php endif; ?>
			<?php include 'condicional-cadastro.php'; ?>

			<div class="ui message">
				
				<form class="ui form" action="validar_alteracao.php" method="POST">
					<h4 class="ui dividing header">Alterar dados do usuário</h4>
					<br>
					<div class="field">
						<div class="two fields">
					
					<div class="field">
					
							<label>Usuário</label>
							<div class="ui left icon input">
								<i class="user icon"></i>
								<input type="text" name="o-usuario" id="usuario" placeholder="Digite um usuario"
								value="<?= $usuario[0]['ONG_USUARIO']?>" required>
							</div>
					</div>
								<div class="field">
							
									<label>Contato</label>
									<div class="ui left icon input">
										<i class="mobile alternate icon"></i>
										<input type="text" name="o-telefone" id="telefone" placeholder="(00) 00000-0000" onkeypress="ipet(this)" value="<?= $usuario[0]['ONG_TELEFONE']?>" required>
									</div>
							
							</div>
						</div>
					</div>
						<div class="field">
					
							<label>Email</label>
							<div class="ui left icon input">
								<i class="envelope icon"></i>
								<input type="text" name="o-email" id="email" placeholder="minhaong@email.com"
								value="<?= $usuario[0]['ONG_EMAIL'] ?>" required>
							</div>
						
					</div>

					<div class="field">
						<div class="two fields">
							<div class="field">
						
									<label>Facebook</label>
									<div class="ui left icon input">
										<i class="facebook icon"></i>
										<input type="text" name="o-facebook" id="facebook" placeholder="facebook.com/minhaong"
										value="<?=$usuario[0]['ONG_FACEBOOK']?>" required>
									</div>
								
							</div>
							<div class="field">
							
									<label>Instagram</label>
									<div class="ui left icon input">
										<i class="instagram icon"></i>
										<input type="text" name="o-instagram" id="instagram" placeholder="instagram.com/minhaong"
										value="<?= $usuario[0]['ONG_INSTAGRAM']?>" required>
									</div>
								
							</div>
						</div>
					</div>



				<div class="field">
						<div class="two fields">
							<div class="field">
		
									<label>Nova senha</label>
									<div class="ui left icon input">
										<i class="lock icon"></i>
										<input type="password" name="o-senha" id="senha" placeholder="Crie uma senha" required>
									</div>
															</div>
							<div class="field">
								
									<label>Confirme Nova Senha</label>
									<div class="ui left icon input">
										<i class="lock icon"></i>
										<input type="password" name="o-conf-senha" id="conf_senha" placeholder="Confirme a senha" required>
									</div>
								
							</div>
						</div>
					</div>

					<input class="ui fluid large blue submit button" type="submit" value="Alterar"></div>

					<a href="perfil_ong.php">Voltar</a>

				</form>

			</div>
		</div>
	</div>

</body>
</html>