<?php
session_start();
	$anonimo = true;
	$usuario= "nick";
	$senha = "13";

 if ($anonimo == true && $usuario != "nick" ||  $senha != "123") {
 	$_SESSION['anonimo'] = true;
			 include 'header01.html';
			 include 'pagina_inicial.html';
 }
		else if(($anonimo) == false){
						if ($usuario== "nick" &&  $senha == "123" ) {
			unset($_SESSION['anonimo']);	
			$_SESSION['usuario'] = true;
			 include  'header02.html';
			 include 'pagina_inicial.html';
				}
					if ($usuario!= "nick" &&  $senha != "123" ) {
						header("location:login.php");
					}
	}
?>
 


