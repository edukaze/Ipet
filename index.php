<?php 
session_start();


if (isset($_SESSION['id_usuario'])) {

}
	elseif (isset($_SESSION['nome_ong']) && isset($_SESSION['id_ong'])) {
	unset($_SESSION['anonimo']);
	}
	else{
		$_SESSION['anonimo'] = true;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>IPET</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="imagem/png" href="/img/iPettt.png" />
</head>
<body>
	<!-- navbar -->
	<header id="header">
		<a href="index.php" class="logo"><img src="img/iPettt.png"></a>
		<ul>
			<li><a href="index.php" onclick="toggle()">Home</a></li>
			<li><a href="#sobre"  onclick="toggle()">Sobre</a></li>
			<li><a href="#serviços"  onclick="toggle()">serviços</a></li>
			<li><a href="#pets"  onclick="toggle()">Pets</a></li>
			<li><a href="#equipe"  onclick="toggle()">Equipe</a></li>
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

	<!-- banner -->
	<section class="banner" id="home">
		<div class="overlay">
			<!-- <h2><span>Atitude é uma pequena<br>coisa que faz uma grande diferença</span></h2> -->
		</div>
	</section>

    <!-- Sobre -->
    <section class="sec" id="sobre">
		<div class="content">
			<div class="mxw800p">
				<h3>Qual o objetivo do iPet?</h3>
				<p>Reverter a situação do grande número de animais abandonados nas ruas, revela-se como um passo importante na luta pelo bem-estar de animais em situação de risco, o descaso com este assunto demonstra que parte da sociedade ainda não está convencida das reais necessidades dos animais esquecendo-se das problemáticas que envolvem o abandono. Os animais devem ser respeitados e ter a possibilidade de vida digna, já que são seres não aptos a manter sua sobrevivência sozinhos, tal temática exige a colaboração de toda a sociedade. No Brasil, centros de adoção, locais e entidades revelam-se como um, dos muitos, modos de solução, sendo assim o iPet manifesta-se com o objetivo de somar, ou seja, um meio imediato e facilitado de ajuda, agindo diretamente na situação que deveria ser o princípio básico de um mundo civilizado, o respeito à vida.</p>
				<?php if(isset($_SESSION['nome'])): ?>
				<?php elseif (isset($_SESSION['nome_ong'])): ?>
					<?php else: ?>
						<a href="login.php" class="btn">Cadastre-se aqui</a>
					<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- serviços -->
	<section class="sec" id="serviços">
		<div class="content">
			<div class="mxw800p">
				<h3>Como Trabalhamos</h3>
				<p>O iPet em parceria com Ongs tem por objetivo ajudar os animais independente da raça ou deficiência decorrente de maus-tratos e abandono. Visto isso, explicaremos passo a passo as funcionalidades da nossa plataforma.</p>
			</div>
			<div class="services">
				<div class="box">
					<div class="iconBx">
						<img src="img/icon1.png">
					</div>
					<div class="content">
						<h2>Ponto de Partida</h2>
						<p>Tem interesse em adotar ou doar um animal? Pois no Ipet fazemos questão de guiá-lo de maneira fácil e segura nas suas escolhas. Mas para isso será preciso um cadastro, para que você interaja nas partes de adoçao e doação como desejar.</p>
					</div>
				</div>
				<div class="box">
					<div class="iconBx">
						<img src="img/icon2.png">
					</div>
					<div class="content">
						<h2>Cadastro</h2>
						<p>Feito o cadastro, é só executar seu login de usuario e conhecer um pouco da história e características de cada pet, ou até mesmo você poderá fazer parte dos doadores e contribuir nessa causa.</p>
					</div>
				</div>
				<div class="box">
					<div class="iconBx">
						<img src="img/icon3.png">
					</div>
					<div class="content">
						<h2>Você também pode ajudar</h2>
						<p>Se cadastrou? fez o Login? Conheceu mais sobre nosso trabalho? Ótimo! é um prazer ter você como nosso cliente. Pedimos que divulguem para seus amigos e familiares sobre nós, pois precisamos que nossa iniciativa chegue a todos.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- stats -->
	<section class="sec stats">
		<div class="content">
			<div class="mxw800p">
				<!-- <h3>Estatísticas</h3>
				<p>O iPet busca trazer uma abordagem mais simples aos meios já existentes, aproximando indivíduos que querem doar animais e pessoas que desejam possuir, cuidar e amar um bichinho, ambos de uma mesma cidade ou região.</p>
			</div>
			<div class="statsBox">
				<div class="box">
					<h2>30MILHÕES+</h2>
					<h4>De Animais abandonados</h4>
				</div>
				<div class="box">
					<h2>30MILHÕES+</h2>
					<h4>De animais maltratados</h4>
				</div>
				<div class="box">
					<h2>30MILHÕES+</h2>
					<h4>De animais doentes <br> nas ruas</h4>
				</div>
				<div class="box">
					<h2>30MILHÕES+</h2>
					<h4>De animais esperando <br> por você</h4>
				</div> -->
			</div>
		</div>
	</section>

	<!-- pets -->
	<section class="sec work" id="pets">
		<div class="content">
			<div class="mxw800p">
				<h3>Animais que você pode doar ou adotar</h3>
				<p>Esses são alguns dos muitos outros animais que você pode doar ou adotar.</p>
			</div>
			<div class="workBx">
				<div class="pet">
					<h2>Cachorro</h2>
				</div>
				<div class="pet">
					<h2>Gato</h2>
				</div>
				<div class="pet">
					<h2>Coelho</h2>
				</div>
				<div class="pet">
					<h2>Ramster</h2>
				</div>
				<div class="pet">
					<h2>Cavalo</h2>
				</div>
				<div class="pet">
					<h2>Tartaruga</h2>
				</div>
				<div class="pet">
					<h2>Peixe</h2>
				</div>
				<div class="pet">
					<h2>Pássaros</h2>
				</div>
			</div>
		</div>
	</section>

	<!-- equipe -->
	<section class="sec" id="equipe">
		<div class="content">
			<div class="mxw800p">
				<h3>Conheça Nossa Equipe</h3>
			</div>
			<div  class="teamBx">
				<div class="member">
					<div class="imgBx">
						<img src="img/suelen.jpg">
					</div>
					<div class="details">
						<div>
							<h2>Suelen<br><span>Gerente</span></h2>
						</div>
					</div>
				</div>
				<div class="member">
					<div class="imgBx">
						<img src="img/eduardo.jpg">
					</div>
					<div class="details">
						<div>
							<h2>Eduardo<br><span>Lider Técnico</span></h2>
						</div>
					</div>
				</div>
				<div class="member">
					<div class="imgBx">
						<img src="img/cleicy.jpg">
					</div>
					<div class="details">
						<div>
							<h2>Cleicy<br><span>Front-end</span></h2>
						</div>
					</div>
				</div>
				<div class="member">
					<div class="imgBx">
						<img src="img/desiree.jpg">
					</div>
					<div class="details">
						<div>
							<h2>Desiree<br><span>Banco de Dados</span></h2>
						</div>
					</div>
				</div>
				<div class="member">
					<div class="imgBx">
						<img src="img/billy.jpg">
					</div>
					<div class="details">
						<div>
							<h2>Lamartine<br><span>Back-end</span></h2>
						</div>
					</div>
				</div>
				<div class="member">
					<div class="imgBx">
						<img src="img/tiago.png">
					</div>
					<div class="details">
						<div>
							<h2>Tiago<br><span>Back-end</span></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Contato -->
    <!-- <section class="sec contact" id="contato">
		<div class="content">
			<div class="mxw800p">
				<h3>Fale Conosco</h3>
				<p>Estamos a disposição para tirar qualquer dúvida.</p>
			</div>
			<div class="contactForm">
				<form>
					<div class="row100">
						<div class="inputBx50">
							<input type="text" name="" placeholder="Nome">
						</div>
						<div class="inputBx50">
							<input type="text" name="" placeholder="Email">
						</div>
					</div>
					<div class="row100">
						<div class="inputBx100">
							<textarea placeholder="Mensagem"></textarea>
						</div>
					</div>
					<div class="row100">
						<div class="inputBx100">
							<input type="submit" name="" value="Enviar">
						</div>
					</div>
				</form>
			</div>
			<div class="sci">
				<nav>
					<ul>
						<li><a href="https://github.com/edukaze/iPET" target="_black"><img src="img/git.png"></a></li>
						<li><a href="https://drive.google.com/file/d/1QKOJcK75IwQ1ZFMn5FM0Eh-Dvjp1L7PK/view?usp=sharing" target="_blank"><img src="img/pdf.png"></a></li>	
					</ul>
				</nav>
			</div>
			<p class="copyright">Igarassu/2020</p>
		</div>
	</section> -->

	<footer class="footer">
		<p>Igarassu-PE</p>
		<a href="https://github.com/edukaze/iPET" target="_black"><i class="fab fa-github"></i></a>
		<a href="https://drive.google.com/file/d/1QKOJcK75IwQ1ZFMn5FM0Eh-Dvjp1L7PK/view?usp=sharing" class="pdf" target="_black"><i class="far fa-file-pdf"></i></a>
	</footer>


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