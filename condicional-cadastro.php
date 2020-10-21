
<?php if(isset($_SESSION['erro-campo'])): ?>
					<div class="erro-campo">
						<p>Por favor preenchar todos os campos.</p>
					</div>
				<?php unset($_SESSION['erro-campo']); ?>

				<?php elseif(isset($_SESSION['erro-contato'])): ?>
					<div class="erro-campo">
						<p>digite um contato valido (00) 0 0000-0000</p>
					</div>
					<?php unset($_SESSION['erro-contato']);?>

				<?php elseif (isset($_SESSION['erro-email'])): ?>
					<div class="erro-campo-grande">
						<p>Por favor digite um email valido</p>
					</div>
				<?php unset($_SESSION['erro-email']); ?>

				<?php elseif(isset($_SESSION['erro-nome'])): ?>
					<div class="erro-campo">
						<p>Campo nome deve ter no minimo 20 caracteres</p>
					</div>
				<?php unset($_SESSION['erro-nome']); ?>

				<?php elseif(isset($_SESSION['erro-nome-char'])): ?>
					<div class="erro-campo-grande">
						<p>Campo nome só deve ter caracteres de a-z</p>
					</div>
				<?php unset($_SESSION['erro-nome-char']); ?>

				<?php elseif(isset($_SESSION['erro-sobrenome'])): ?>
					<div class="erro-campo-grande">
						<p>Campo sobrenome deve ter minimo 25 caracteres</p>
					</div>
				<?php unset($_SESSION['erro-sobrenome']); ?>

				<?php elseif(isset($_SESSION['erro-sobrenome-char'])): ?>
					<div class="erro-campo-grande">
						<p>Campo sobrenome só deve ter caracteres de a-z</p>
					</div>
				<?php unset($_SESSION['erro-sobrenome-char']); ?>

				<?php elseif(isset($_SESSION['erro-senha'])): ?>
					<div class="erro-campo">
						<p>A senha deve ter no minimo 8 digitos</p>
					</div>
				<?php unset($_SESSION['erro-senha']); ?>

				<?php elseif(isset($_SESSION['erro-conf-senha'])): ?>
					<div class="erro-campo">
						<p> As senhas não coincidem</p>
					</div>
				<?php unset($_SESSION['erro-conf-senha']) ?>

				<?php elseif(isset($_SESSION['usuario_existe'])): ?>
					<div class="erro-campo">
						<p>Usuário ja exister</p>
					</div>
				<?php unset($_SESSION['usuario_existe']); ?>

				<?php elseif(isset($_SESSION['status_cadastro'])): ?>
					<div class="campo-certo">
						<p>Cadastro feito com sucesso clique<a href="login.php"> aqui</a> para fazer o login</p>
					</div>
					<?php unset($_SESSION['status_cadastro']) ?>

				<?php elseif(isset($_SESSION['erro-facebook'])): ?>
					<div class="campo-erro">
						<p> Por favor digite um facebook valido</p>
					</div>
					<?php unset($_SESSION['erro-facebook']); ?>

				<?php elseif (isset($_SESSION['erro-nome-ong'])):?>
					<div class="erro-campo-grande">
						<p>O nome da ong deve ter o maximo 50 caracteres</p>
					</div>
					<?php unset($_SESSION['erro-nome-ong']); ?>

					<?php elseif(isset($_SESSION['usuario_existe'])): ?>
						<div class="erro-campo">
							<p>ONG já cadastrata</p>
						</div>
					<?php unset($_SESSION['error-cnpj']); ?>
					<?php elseif(isset($_SESSION['cnpj-erro'])): ?>
						<div class="erro-campo">
							<p>insira um CNPJ válido</p>
						</div>
					<?php unset($_SESSION['error-cnpj']); ?>
					<?php elseif(isset($_SESSION['erro-instagram'])): ?>
						<div class="erro-campo">
							<p>insira um instagram válido</p>
						</div>
					<?php unset($_SESSION['erro-instagram']); ?>
					<?php elseif(isset($_SESSION['erro-nome-ong'])): ?>
						<div class="erro-campo">
							<p>campo nome ONG inválido</p>
						</div>
					<?php unset($_SESSION['erro-nome-ong']); ?>
				<?php endif ?>