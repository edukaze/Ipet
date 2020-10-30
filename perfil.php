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
	SELECT * FROM IPET_ANIMAIS
	LEFT JOIN IPET_USUARIO_NORMAL ON ANI_NOR_CODIGO = NOR_CODIGO
    WHERE NOR_CODIGO = ?;
	/*LEFT JOIN IPET_USUARIOS_ONG ON ANI_ONG_ID = ONG_ID;*/
	");
$stmt->execute([$_SESSION['id_usuario']]);
$animais =  $stmt->fetchAll();

// var_dump($animais);

$rowTotal = $stmt->rowCount();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="css/edicao.css"/>
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<body>
	<!-- navbar -->
	<header id="header">
		<a href="" class="logo"><img src="img/iPettt.png"></a>
		<ul>
			<li><a href="index.php" onclick="toggle()">Home</a></li>
			<li><a href="index.php#sobre"  onclick="toggle()">Sobre</a></li>
			<li><a href="index.php#serviços"  onclick="toggle()">serviços</a></li>
			<li><a href="index.php#pets"  onclick="toggle()">Pets</a></li>
			<li><a href="index.php#equipe"  onclick="toggle()">Equipe</a></li>
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

			<section class="titulo">
				<h1>MEU(S) PET(S)</h1>
			</section>


			<section class="edc">
				<div class="box">
					<div class="box1">

						<?php if ($rowTotal > 0 && isset($_SESSION['id_usuario'])): ?>
							<?php foreach ($animais as  $animal): ?>
								<?php
								$imagem = 'imagens/1/bbb.jpeg';
								if (is_file("imagens/" .  $animal['ANI_CODIGO'] . "/" . $animal['ANI_IMAGEM'])) {
									$imagem = "imagens/" .  $animal['ANI_CODIGO'] . "/" . $animal['ANI_IMAGEM'];
								}
								?>
								<div class="box2">
									<dl>
										<dt>Chave Normal usu</dt>
										<dd><?= $animal['ANI_NOR_CODIGO']?></dd>
										<dt>Nome</dt>
										<dd><?= $animal['ANI_NOME']?></dd>
										<dd><img src="<?= $imagem ?>"></dd>
										<dt>Espécie</dt>
										<dd><?= $animal['ANI_ESPECIE']?></dd>
										<dt>Raça</dt>
										<dd><?= $animal['ANI_RAÇA']?></dd>
										<dt>Porte</dt>
										<dd><?= $animal['ANI_PORTE']?></dd>
										<dt>Gênero</dt>
										<dd><?= $animal['ANI_GENERO']?></dd>
										<dt>Descrição</dt>
										<dd><?= $animal['ANI_DESCRICAO']?></dd>
									</dl>
									<br>
									<a href="edicao_animal.php?id=<?= $animal['ANI_CODIGO'] ?>">Editar</a>
									<a href="delete.php?id=<?= $animal['ANI_CODIGO'] ?>" style="background: red;">Excluir</a>
								</div>
								

							<?php endforeach; ?>
						<?php endif; ?>

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