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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
	
</head>
<body>
	<?php  include 'header-diminuido.php'; ?>
			<section class="adc">
				<div class="ui four cards">
						<?php if ($rowTotal > 0): ?>
							<?php foreach ($resultados as  $result): ?>
								<div class="ui card">
									<div class="content">
										<div class="header"><?= $result['ONG_NOME']?></div>
									</div>
									<div class="content">
										<h4 class="ui sub header">Descrição</h4>
										<div class="ui small feed">
											<div class="event">
												<div class="extra content">
													<?= $result['ONG_DESCRICAO']?>
												</div>
											</div>
										</div>
										<div class="content">
											<div class="summary">
												<button class="ui button"><a href="perfil-ong-geral.php?id=<?= $result['ONG_ID'] ?>">Veja Mais Sobre a gente</a></button>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>  
						<?php endif; ?> 
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