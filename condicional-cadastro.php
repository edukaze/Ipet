<?php if(isset($_SESSION['erro-campo'])): ?>
	<div class="erro-campo">
		<p>Por favor preencha todos os campos</p>
	</div>
	<?php unset($_SESSION['erro-campo']); ?>

	<?php elseif(isset($_SESSION['erro-contato'])): ?>
		<div class="erro-campo">
			<p>Digite um contato válido</p>
		</div>
		<?php unset($_SESSION['erro-contato']);?>

		<?php elseif (isset($_SESSION['erro-email'])): ?>
			<div class="erro-campo-grande">
				<p>Por favor digite um email válido</p>
			</div>
			<?php unset($_SESSION['erro-email']); ?>

			<?php elseif(isset($_SESSION['erro-nome'])): ?>
				<div class="erro-campo">
					<p>O campo nome deve ter no mínimo 20 caracteres</p>
				</div>
				<?php unset($_SESSION['erro-nome']); ?>

				<?php elseif(isset($_SESSION['erro-nome-char'])): ?>
					<div class="erro-campo-grande">
						<p>O campo nome só deve ter caracteres de a-z</p>
					</div>
					<?php unset($_SESSION['erro-nome-char']); ?>

					<?php elseif(isset($_SESSION['erro-sobrenome'])): ?>
						<div class="erro-campo-grande">
							<p>O campo sobrenome deve ter no mínimo 25 caracteres</p>
						</div>
						<?php unset($_SESSION['erro-sobrenome']); ?>

						<?php elseif(isset($_SESSION['erro-sobrenome-char'])): ?>
							<div class="erro-campo-grande">
								<p>O campo sobrenome só deve ter caracteres de a-z</p>
							</div>
							<?php unset($_SESSION['erro-sobrenome-char']); ?>

							<?php elseif(isset($_SESSION['erro-senha'])): ?>
								<div class="erro-campo">
									<p>A senha deve ter no mínimo 8 digitos</p>
								</div>
								<?php unset($_SESSION['erro-senha']); ?>

								<?php elseif(isset($_SESSION['erro-conf-senha'])): ?>
									<div class="erro-campo">
										<p>As senhas não coincidem</p>
									</div>
									<?php unset($_SESSION['erro-conf-senha']) ?>

									<?php elseif(isset($_SESSION['usuario_existe'])): ?>
										<div class="erro-campo">
											<p>Nome de usuário já existente</p>
										</div>
										<?php unset($_SESSION['usuario_existe']); ?>
										<?php elseif(isset($_SESSION['erro-facebook'])): ?>
											<div class="campo-erro">
												<p>Por favor digite um facebook válido</p>
											</div>
											<?php unset($_SESSION['erro-facebook']); ?>

											<?php elseif (isset($_SESSION['erro-nome-ong'])):?>
												<div class="erro-campo-grande">
													<p>O nome da ong deve ter o máximo 50 caracteres</p>
												</div>
												<?php unset($_SESSION['erro-nome-ong']); ?>

												<?php elseif(isset($_SESSION['usuario_existe'])): ?>
													<div class="erro-campo">
														<p>Essa ONG já foi cadastrada</p>
													</div>
													<?php unset($_SESSION['error-cnpj']); ?>
													<?php elseif(isset($_SESSION['cnpj-erro'])): ?>
														<div class="erro-campo">
															<p>Insira um CNPJ válido</p>
														</div>
														<?php unset($_SESSION['error-cnpj']); ?>
														<?php elseif(isset($_SESSION['erro-instagram'])): ?>
															<div class="erro-campo">
																<p>Insira um instagram válido</p>
															</div>
															<?php unset($_SESSION['erro-instagram']); ?>
															<?php elseif(isset($_SESSION['erro-nome-ong'])): ?>
																<div class="erro-campo">
																	<p>Campo nome ONG inválido</p>
																</div>
																<?php unset($_SESSION['erro-nome-ong']); ?>
																<?php endif ?>