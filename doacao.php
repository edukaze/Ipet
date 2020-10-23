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
<html lang="pt-br">
<head>
	<title>Cadastro Animais</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/cadastro_doacao.css">
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<body>
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
						</body>