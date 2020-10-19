<?php session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro ONGs</title>
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
						<form action="verificar_cadastro_ong.php" method="POST">
							<div class="fild">
								<div class="controle">
									<p><label for="nome-ong">&nbsp;&nbsp;&nbsp;ONG: </label>
										<input type="text" name="o-nome-ong" id="nome-ong" size="20" placeholder="Digite o nome da ONG"></p>
									</div>
								</div>

								<div class="fild">
									<div class="controle">
										<p><label for="cnpj">&nbsp;&nbsp;CNPJ: </label>
											<input type="text" name="o-cnpj" id="cnpj" size="20" placeholder="00.000.000/0000-00"></p>
										</div>
									</div>


									<div class="fild">
										<div class="controle">
											<p><label for="facebook">Facebook:</label>
												<input type="text" name="o-facebook" id="facebook" size="20" placeholder="facebook.com/minhaong"></p>
											</div>
										</div>

										<div class="fild">
											<div class="controle">
												<p><label for="instagram">Instagram:</label>
													<input type="text" name="o-instagram" id="instagram" size="20" placeholder="instagram.com/minhaong"></p>
												</div>
											</div>

											<div class="fild">
												<div class="controle">
													<p><label for="email">Email:</label>
														<input type="text" name="o-email" id="email" size="20" placeholder="minhaong@email.com"></p>
													</div>
												</div>

												<div class="fild">
													<div class="controle">
														<p><label for="telefone">Telefone:</label>
															<input type="text" name="o-telefone" id="telefone" size="20" placeholder="(00) 00000-0000"></p>
														</div>
													</div>


													<div class="fild">
														<div class="controle">
															<p><label for="usuario">&nbsp;&nbsp;Usuário: </label>
																<input type="text" name="o-usuario" id="usuario" size="20" placeholder="Digite o seu usuario"></p>
															</div>
														</div>
														<div class="fild">
															<div class="controle">	
																<p><label for="senha">&nbsp;&nbsp;Senha: </label>
																	<input type="password" name="o-senha" id="senha" size="20" placeholder="Digite uma senha"></p>
																</div>
															</div>

															<div class="fild">
																<div class="controle">
																	<p><label for="conf_senha">Conf senha: </label>
																		<input type="password" name="o-conf-senha" id="conf_senha" size="20" placeholder="Digite novamente a senha"></p>
																	</div>
																</div>

																<div class="fild">
																	<div class="controle">
																		<p><label for="descricao">Descrição:</label>
																			<input type="text" name="o-descricao" id="descricao" size="20" placeholder="Descreva sobre sua ONG"></p>
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
											<br>
											<br>
											<br>
											<br>
											<br>
											<br>
											<br>
											<br>
											<section>
												<div class="botao-volta">
													<p><a href="login.php">LOGIN</a></p>
												</div>
											</section>
											<br>
											<br>
										</body>
										</html>