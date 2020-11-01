<?php 
session_start();
 
include 'banco.php';
$pdo = dbConnect();
 $r = "SELECT * FROM IPET_USUARIOS_ONG"; 

$preprarandoOgns= $pdo->prepare($r); 
$preprarandoOgns->execute();

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


<?php if ($rowTotal > 0): ?>
                     <?php foreach ($ongs as  $ong): ?>
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
                     <?php endforeach; ?>  
                  <?php endif; ?>
<div class="box-botao">     
<div class="botao">    
   <a href="lista.php">Veja mais ONGs</a>
</div>
</div>
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

