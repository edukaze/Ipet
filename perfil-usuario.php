<?php 
session_start();


include 'banco.php';
$id = $_GET['id'];
$pdo = dbConnect();
$r = "SELECT * FROM IPET_USUARIO_NORMAL
WHERE NOR_CODIGO = ?";
$query = "SELECT * FROM IPET_ANIMAIS
WHERE ANI_NOR_CODIGO = ?";

$animaisusu = $pdo->prepare($query);

$smtm= $pdo->prepare($r); 
$smtm->execute([$id]);
$animaisusu->execute([$id]);


$animais =  $animaisusu->fetchAll();
$rowTotal = $animaisusu->rowCount();

$usuario = $smtm->fetchAll();
$rowTotal2 =$smtm -> rowCount();

?>	
<!DOCTYPE html>
<html>
<head>
	<title>PERFIL USUÁRIO</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/perfil-ong.css"/>
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<body>
	<?php  include 'header-diminuido.php' ?>


	<?php   var_dump($_GET['id']); ?>
	<?php if ($rowTotal2 > 0): ?>
		<?php foreach ($usuario as  $usuarios): ?>
			<section class="voltar">
				<a href="index.php"></a>
			</section>
			<section class="edc">
				<div class="box">
					<div class="box1">
						<div class="box2">
							<dl>
								<dt>Nome</dt>
								<dd><?= $usuarios['NOR_NOME']?></dd>
								<dt>Contato</dt>
								<dd><?= $usuarios['NOR_CONTATO']?></dd>
								<dt>Email</dt>
								<dd><?= $usuarios['NOR_EMAIL']?></dd>
							</dl>
						</div>
					</div>
				</div>
			</section>
		<?php endforeach ?>  
	<?php endif ?>

	<?php foreach ($animais as  $animal): ?>
		<?php
		$imagem = 'imagens/1/bbb.jpeg';
		if (is_file("imagens/" .  $animal['ANI_CODIGO'] . "/" . $animal['ANI_IMAGEM'])) {
			$imagem = "imagens/" .  $animal['ANI_CODIGO'] . "/" . $animal['ANI_IMAGEM'];
		}
		?>
		<section class="usuarios">
			<div class="box3">
				<div class="box4">
					<div class="box5">
						<dl>
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
					<?php endforeach ?>
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