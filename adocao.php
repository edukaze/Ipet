<?php 
session_start();

if (isset($_SESSION['anonimo'])) {
	header("location:login.php");
}
	elseif (isset($_SESSION['anonimo'])) {
	header("location:login.php");
}

include 'banco.php';
$pdo = dbConnect();

$stmt = $pdo->prepare("
	SELECT * FROM IPET_ANIMAIS;
	");
$stmt->execute();
$animais =  $stmt->fetchAll();

$rowTotal = $stmt->rowCount();


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Adote</title>
	<link rel="stylesheet" type="text/css" href="css/cadastro_adocao.css">
	
</head>
<body>

	<?php if ($rowTotal > 0): ?>
		<?php foreach ($animais as  $animal): ?>
			<div class="animais">
		<p><?= $animal['ANI_NOME']?></p>
		<p><?= $animal['ANI_ESPECIE']?></p>
		<p><?= $animal['ANI_RAÇA']?></p>
		<p><?= $animal['ANI_PORTE']?></p>
		<p><?= $animal['ANI_GENERO']?></p>
		<p><?= $animal['ANI_DESCRICAO']?></p>
			</div>
<?php endforeach; ?>
	<?php endif; ?>

	<!-- navbar -->
	<header id="header">
		<a href="" class="logo"><img src="img/iPettt.png"></a>
		<ul>
			<li><a href="index.php" onclick="toggle()">Home</a></li>
			<li><a href="index.php"  onclick="toggle()">Sobre</a></li>
			<li><a href="index.php"  onclick="toggle()">serviços</a></li>
			<li><a href="index.php"  onclick="toggle()">Pets</a></li>
			<li><a href="index.php"  onclick="toggle()">Equipe</a></li>
			<!-- <li><a href="#contato"  onclick="toggle()">Contato</a></li> -->
			<li><a href="adocao.php"  onclick="toggle()">Adoção</a></li>
			<li><a href="doacao.php"  onclick="toggle()">Doação</a></li>
			<li><a href="#"  onclick="toggle()">Ongs</a></li>
			<?php if(isset($_SESSION['nome'])): ?>
			<li><a href="index.php"  onclick="toggle()" class="cadastro_user"><?php echo $_SESSION['nome'];?> </a>
		<ul>
			<li><a href="sair.php"  onclick="toggle()" class="cadastro_user">sair</a></li>
		</ul>
			</li>
				<?php elseif (isset($_SESSION['nome_ong'])): ?>
				<li><a href="index.php"  onclick="toggle()" class="cadastro_user"><?php echo $_SESSION['nome_ong']; ?></a>
					<ul>
						<li><a href="sair.php"  onclick="toggle()" class="cadastro_user">sair</a></li>
					</ul>
				</li>
				<?php else: ?>
					<?php unset($_SESSION['nome']); ?>
					<?php unset($_SESSION['nome_ong']); ?>
					<li><a href="login.php"  onclick="toggle()" class="cadastro">cadastro</a></li>
				<?php endif ?>
		</ul>
		<div class="toggle" onclick="toggle()"></div>
	</header>

		<!-- banner -->
	<section class="banner" id="home">
		<div class="overlay">
			<!-- <h2><span>Atitude é uma pequena<br>coisa que faz uma grande diferença</span></h2> -->
		</div>
	</section>

	<section class="adc">
		<div class="box">
			<div class="box1">
				<div class="box2">
					<dl>
						<dt>Nome</dt>
						<dd> Html Basico</dd>
						<dt>Espécie</dt>
						<dd> PHP Básico</dd>
						<dt>Raça</dt>
						<dd> PHP Básico</dd>
						<dt>Porte</dt>
						<dd> PHP Básico</dd>
						<dt>Gênero</dt>
						<dd> PHP Básico</dd>
						<dt>Descrição</dt>
						<dd> PHP Básico</dd>
					</dl>
				</div>
				<div class="box2">
					<dl>
						<dt>Nome</dt>
						<dd> Html Basico</dd>
						<dt>Espécie</dt>
						<dd> PHP Básico</dd>
						<dt>Raça</dt>
						<dd> PHP Básico</dd>
						<dt>Porte</dt>
						<dd> PHP Básico</dd>
						<dt>Gênero</dt>
						<dd> PHP Básico</dd>
						<dt>Descrição</dt>
						<dd> PHP Básico</dd>
					</dl>
				</div>
				<div class="box2">
					<dl>
						<dt>Nome</dt>
						<dd> Html Basico</dd>
						<dt>Espécie</dt>
						<dd> PHP Básico</dd>
						<dt>Raça</dt>
						<dd> PHP Básico</dd>
						<dt>Porte</dt>
						<dd> PHP Básico</dd>
						<dt>Gênero</dt>
						<dd> PHP Básico</dd>
						<dt>Descrição</dt>
						<dd> PHP Básico</dd>
					</dl>
				</div>
				<div class="box2">
					<dl>
						<dt>Nome</dt>
						<dd> Html Basico</dd>
						<dt>Espécie</dt>
						<dd> PHP Básico</dd>
						<dt>Raça</dt>
						<dd> PHP Básico</dd>
						<dt>Porte</dt>
						<dd> PHP Básico</dd>
						<dt>Gênero</dt>
						<dd> PHP Básico</dd>
						<dt>Descrição</dt>
						<dd> PHP Básico</dd>
					</dl>
				</div>
				<div class="box2">
					<dl>
						<dt>Nome</dt>
						<dd> Html Basico</dd>
						<dt>Espécie</dt>
						<dd> PHP Básico</dd>
						<dt>Raça</dt>
						<dd> PHP Básico</dd>
						<dt>Porte</dt>
						<dd> PHP Básico</dd>
						<dt>Gênero</dt>
						<dd> PHP Básico</dd>
						<dt>Descrição</dt>
						<dd> PHP Básico</dd>
					</dl>
				</div>

				<div class="box2">
					<dl>
						<dt>Nome</dt>
						<dd> Html Basico</dd>
						<dt>Espécie</dt>
						<dd> PHP Básico</dd>
						<dt>Raça</dt>
						<dd> PHP Básico</dd>
						<dt>Porte</dt>
						<dd> PHP Básico</dd>
						<dt>Gênero</dt>
						<dd> PHP Básico</dd>
						<dt>Descrição</dt>
						<dd> PHP Básico</dd>
					</dl>
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript">
		// Deixa o header fixo no site
		window.addEventListener("scroll", function(){
			var header = document.querySelector("header");
			header.classList.toggle("sticky", window.scrollY > 0);
		})
		// Essa função é para o menu responsivo
		function toggle(){
			var header = document.querySelector("header");
			header.classList.toggle("active");
		}
	</script>
</body>
</html>