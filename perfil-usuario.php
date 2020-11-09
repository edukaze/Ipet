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

	   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</head>
<body>
	<?php  include 'header-diminuido.php' ?>

	<?php if ($rowTotal2 > 0): ?>
		<?php foreach ($usuario as  $usuarios): ?>
			<section class="voltar">
				<a href="index.php"></a>
			</section>

			<section class="edc">
				<div class="box">			
						<div class="ui card">
						  <div class="content">
						    <div class="header"><?= $usuarios['NOR_NOME']?></div>
						  </div>
						  <div class="content">
						    <h4 class="ui sub header">Contato</h4>
						    <div class="ui small feed">
						      <div class="event">
						        <div class="content">
						          <div class="summary">
						             <?= $usuarios['NOR_CONTATO']?>
						          </div>
						        </div>
						      </div>
						      <div class="event">
						        <div class="content">
						          <div class="summary">
						             <?= $usuarios['NOR_EMAIL']?>
						          </div>
						        </div>
						      </div>
						  		<div class="extra content">
						   			<button class="ui button">Entrar em contato</button>
						 		</div>
							</div>
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
    			<div class="ui four cards">
    			    <div class="ui card">
								<div class="image">
							<img src="<?= $imagem ?>">
								</div>

			            <div class="content">
			               <div class="header"><?= $animal['ANI_NOME']?></div>
			    				<div class="extra content">
							<div class="description">
			              		DESCRIÇÃO <br>
								Espécie: <?= $animal['ANI_ESPECIE']?> <br>
								Raça: <?= $animal['ANI_RAÇA']?> <br>
								Porte: <?= $animal['ANI_PORTE']?> <br> Gênero: <?= $animal['ANI_GENERO']?> <br>
			            	</div>
						</div>

							<div class="extra content">
								<div class="descriptin">
									Sobre o pet: <?= $animal['ANI_DESCRICAO']?>
								</div>
							</div>
			        	</div>
			     	</div>   
    		
    		</div>
		 </section>


      <?php endforeach; ?>	<script type="text/javascript">
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