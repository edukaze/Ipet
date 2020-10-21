<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro Animais</title>
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
						<h1>Cadastro Animais</h1><img src="img/iPettt.png" alt="">
					</div>
					<?php include 'condicional-cadastro.php'; ?>
					<div class="formulario2">
						<form action="validar_cadastro_animais.php" method="POST">
							<div class="fild">
								<div class="controle">
									<p><label for="nome-ani">Nome:</label>
										<input type="text" name="a-nome" id="nome-ong" size="20" placeholder="Nome"></p>
									</div>
								</div>

								<div class="fild">
									<div class="controle">
										<p><label for="especie">Espécie: </label>
											<input type="text" name="a-especie" id="cnpj" size="20" placeholder="Espécie"></p>
										</div>
									</div>


									<div class="fild">
										<div class="controle">
											<p><label for="raca">Raça:</label>
												<input type="text" name="a-raca"  size="20" placeholder="Raça"></p>
											</div>
										</div>

										<div class="fild">
											<div class="controle">
												<p><label for="porte">Porte:</label>
													<input type="text" name="a-porte"  size="20" placeholder="Porte"></p>
												</div>
											</div>

											<div class="fild">
												<div class="controle">
													<p><label for="genero">Gênero</label>
														<input type="text" name="a-genero"  size="20" placeholder="Gênero"></p>
													</div>
												</div>

												<div class="fild">
													<div class="controle">
														<p><label for="descricao">Descrição:</label>
															<input type="text" name="a-descricao" size="20" placeholder="Descrição"></p>
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
								<p><a href="index.php">VOLTAR</a></p>
							</div>
						</body>