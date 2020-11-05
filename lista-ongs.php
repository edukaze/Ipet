<?php 
session_start();


include 'banco.php';
$pdo =  dbConnect();
 $r = "SELECT * FROM IPET_USUARIOS_ONG ORDER BY ONG_NOME ASC"; 

$resultado= $pdo->prepare($r); 
$resultado->execute();
$resultados = $resultado-> fetchAll();
$rowTotal = $resultado-> rowCount();
 ?>

<!DOCTYPE html>
<html>
<head>
<title>ONGS</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/lista_ongs.css"/>
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<body>
	<?php  include 'header-diminuido.php'; ?>
			<section class="adc">
				<div class="box">
					<div class="box1">

						<?php if ($rowTotal > 0): ?>
							<?php foreach ($resultados as  $result): ?>
								<div class="box2">
									<dl>
										<dt>Nome</dt>
										<dd><?= $result['ONG_NOME']?></dd>
										<dt>descrição</dt>
										<dd><?= $result['ONG_DESCRICAO']?></dd>
										<div class="botao">
										<a href="perfil-ong-geral.php?id=<?= $result['ONG_ID'] ?>">Veja Mais Sobre a gente</a>
										</div>
									</dl>
								</div>
							<?php endforeach; ?>  
						<?php endif; ?> 

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