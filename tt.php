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
   <link rel="stylesheet" type="text/css" href="css/edicao.css"/>
   <link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<body>
   <header id="header">
      <a href="index.php" class="logo"><img src="img/iPettt.png"></a>
      <ul>
         <li><a href="index.php" onclick="toggle()">Home</a></li>
         <li><a href="index.php#sobre"  onclick="toggle()">Sobre</a></li>
         <li><a href="index.php#serviços"  onclick="toggle()">serviços</a></li>
         <li><a href="index.php#pets"  onclick="toggle()">Pets</a></li>
         <li><a href="index.php#equipe"  onclick="toggle()">Equipe</a></li>
         <!-- <li><a href="#contato"  onclick="toggle()">Contato</a></li> -->
         <li><a href="adocao.php"  onclick="toggle()">Adoção</a></li>
         <li><a href="doacao.php"  onclick="toggle()">Doação</a></li>
         <li><a href="lista.php"  onclick="toggle()">Ongs</a></li>
         <?php if(isset($_SESSION['nome'])): ?>
         <li><a href="index.php"  onclick="toggle()" class="cadastro_user"><?php echo $_SESSION['nome'];?> </a>
      <ul>
         <li><a href="perfil.php "onclick="toggle()" class="cadastro_user">perfil</a></li>
         <li><a href="sair.php"  onclick="toggle()" class="cadastro_user">sair</a></li>
      </ul>
         </li>
            <?php elseif (isset($_SESSION['nome_ong'])): ?>
            <li><a href="index.php"  onclick="toggle()" class="cadastro_user"><?php echo $_SESSION['nome_ong']; ?></a>
               <ul>
                  <li><a href="perfil_ong.php "onclick="toggle()" class="cadastro_user">perfil</a></li>
                  
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

