<?php 
session_start();

if (isset($_SESSION['anonimo'])) {
	header("location:login.php");
}
elseif (isset($_SESSION['anonimo'])) {
	header("location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Adote</title>
	<link rel="stylesheet" type="text/css" href="css/cadastro_adocao.css"/>
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>

<body>

	<!-- navbar -->
	<?php  include 'header-diminuido.php'; ?>
			<!-- banner -->
			<section class="banner" id="home">
				<div class="overlay">
					<h2>Visualize os animais<br>disponíveis para adoção<br><br><span>⇣</span></span></h2>
				</div>
			</section>

			<section class="adc">
				<div class="box">
				</div>
			</section>



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

		function loadData() {
			console.log('fazendo requisição...');
			$.ajax('adocao-ajax.php', {
				success: function(data) {
					console.log('atualizando...');
					$('.box').html(data);
				}
			})
		}

		$(document).ready(function() {
			loadData();
		});

		setInterval(function() {
			loadData();
		}, 5 * 60 * 1000);
	</script>
</body>
</html>