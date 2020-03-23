<?php 
	session_start();
	$_SESSION['anonimo'] = "deslogado";

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/home.css">
</head>
<body>
	<header>
		<div class="logo"><a href="index.html">Ipet</div>
		<nav class="menu">
			<ul>
				<li class="selected"><a href="index.html">Home |</a></li>
				<li><a href="Sobre.html">Sobre |</a></li>
				<li><a href="ongs.php">Ongs |</a></li>
				<li><a href="doacao.php">Doação |</a></li>
				<li><a href="adote.php">Adote |</a></li>
				<li><a href="contato.php">Contatos |</a></li>
				<li class="cadastro"><a href="login.php">Cadastre-se</a></li>
			</ul>
		</nav>
		<div class="clear"></div>
	</header>

	<section class="banner_bg">
		<div class="banner">	
			<h2>Atitude<br> é uma<br> pequena <br>coisa que<br> faz uma <br> grande <br> diferença.</h2>
			<div class="botao1" style="padding:0 5%;">
				<a href="">Doação</a>
			</div>
			<div class="botao2">
				<a href="">Adoção</a>
			</div>
		</div>
	</section>

	<section class="frase">
		<div class="container"> 
			<h2>"Adoção tem o poder de transformar homem e animal em um só coração!"</h2>
		</div>
	</section>

	<section class="perguntas">
		<div class="container">
			<div class="card" style="padding: 60px 0 0;">
				<div class="face face1"> 
					<div class="content">
						<img src="imagens/quem-somos.png">
						<h3>Quem Somos?</h3>
					</div>
				</div>
				<div class="face face2"> 
					<div class="content">
						<p>Somos a maior plataforma de adoção e doação de animais. Atuamos com ongs que ajudam animais abandonados e com pessoas que não desfrutam de condições para cuidar dos seus proprios pets.</p>
						<a href="#">Sobre Nós</a>
					</div>
				</div>
			</div>
			<div class="card" style="padding: 60px 0 0;">
				<div class="face face1"> 
					<div class="content">
						<img src="imagens/como-funciona.jpg">
						<h3>Como Funciona?</h3>
					</div>
				</div>
				<div class="face face2"> 
					<div class="content">
						<p>Para realizar uma doação ou adoção precisamos do seu cadastro. Pois assim, é uma forma mais segura e confiável de interagirmos e trabalharmos com seus animais.</p>
						<a href="#">Cadastre-se</a>
					</div>
				</div>
			</div>
			<div class="card" style="padding: 60px 0 0;">
				<div class="face face1"> 
					<div class="content">
						<img src="imagens/porque-adota.jpg">
						<h3>Porque adotar ou<br> doar?</h3>
					</div>
				</div>
				<div class="face face2"> 
					<div class="content">
						<p>O número de animais vivendo nas ruas são impressionates, e ações tomadas por nós é essencial  no combate a essa luta. Então doar um pet que você não pode cuidar é a melhor opção, ou até mesmo adotar um pode ser uma experiência emocionante.</p>
						<a href="#">Adote</a>
						<a href="#" style="display: inline-block; float: center;">Doe</a>
					</div>
				</div>
			</div>
		</div>
 	</section>

	<section class="box">
		<slider>
			<slide></slide>
			<slide></slide>
			<slide></slide>
			<slide></slide>
		</slider>
		<div class="dados">
			<p>Cerca de 30 milhões de animais vivem em situação de abandono e maus-tratos. visto isso, sua contribuição torna-se essencial para o IPET alcançar sua missão.</p>
		</div>
	</section>

	<section class="doar">
		<h2>O IPET em parceria com Ongs tem por objetivo ajudar esses e vários outros animais independente da raça ou deficiência decorrente de maus-tratos e abandono.</h2>		
		<div class="circle1"></div>
		<div class="circle2"></div>
		<div class="circle3"></div>
		<div class="circle4"></div>
		<div class="circle5"></div>	
	</section>

	<footer class="footer">
		<a href="sobre.php">Sobre nós</a>
		<a href="doacao.php">adoção</a>
		<a href="adote.php">doação</a>
		<a href="login.php">Cadastre-se</a>
		<p>Igarassu-PE</p>
	</footer>
</body>
</html>