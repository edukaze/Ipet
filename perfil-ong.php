<?php 
session_start();
 

include 'banco.php';
$id = $_GET['id'];
$pdo = dbConnect();
 $r = "SELECT * FROM IPET_USUARIOS_ONG; ";
 $query = "SELECT * FROM IPET_ANIMAIS
      WHERE ANI_ONG_ID = ?;";

$animaisong = $pdo->prepare($query);

$preprarandoOgns= $pdo->prepare($r); 
$preprarandoOgns->execute();
$animaisong->execute([$id]);


$animais =  $animaisong->fetchAll();
$rowTotal = $animaisong->rowCount();

$ongs = $preprarandoOgns->fetchAll();
$rowTotal =$preprarandoOgns -> rowCount();

?>	
<!DOCTYPE html>
<html>
<head>
	<title>PERFIL ONG</title>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="css/perfil-ong.css"/>
   <link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<body>
  <?php  include 'header-diminuido.php'; ?>


<?php   var_dump($_GET['id']); ?>
<?php if ($rowTotal > 0): ?>
                     <?php foreach ($ongs as  $ong): ?>
                 	<section class="voltar">
                 		<a href="lista-ongs.php"> < < </a>
                 	</section>
                     <section class="edc">
                     	<div class="box">
	                		<div class="box1">
	                   		  <div class="box2">
	                           <dl>
	                              <dt>Nome</dt>
	                              <dd><?= $ong['ONG_NOME']?></dd>
	                              <dt>CNPJ</dt>
	                              <dd><?= $ong['ONG_CNPJ']?></dd>
	                              <dt>Facebook</dt>
	                              <dd><a href="https://facebook\.com\<?= $ong['ONG_FACEBOOK']?>">facebook</a></dd>
	                              <dt>Instagram</dt>
	                              <dd><a href="https://instagram\.com\<?=$ong['ONG_INSTAGRAM']?>">Instagram</a></dd>
	                              <dt>descrição</dt>
	                              <dd><?= $ong['ONG_DESCRICAO']?></dd>
	                           </dl>
	                          </div>
	                        </div>
                        </div>
    				</section>
                     <?php endforeach; ?>  
                  <?php endif; ?>

                  <?php foreach ($animais as  $animal): ?>
         <?php
         $imagem = 'imagens/1/bbb.jpeg';
         if (is_file("imagens/" .  $animal['ANI_CODIGO'] . "/" . $animal['ANI_IMAGEM'])) {
            $imagem = "imagens/" .  $animal['ANI_CODIGO'] . "/" . $animal['ANI_IMAGEM'];
         }
         ?>

	         <div class="box1">
		         <div class="box2">
		            <dl>
		               <dt>Nome</dt>
		               <dd><?= $animal['ANI_NOME']?></dd>
		               <dd><img src="<?= $imagem ?>"></dd>
		               <dt>Chave ong</dt>
		               <dd><?= $animal['ANI_ONG_ID']?></dd>
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
		         </div>
    	 </div>


      <?php endforeach; ?>
<!-- <div class="box-botao">     
<div class="botao">    
   <a href="lista-ongs.php">Veja mais ONGs</a>
</div>
</div> -->


	
<?php include 'footer.php'; ?>


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

