<?php
session_start();
$_SESSION['anonimo'] = "logado";
	 $_SESSION['usario'] ="nick";
	 $_SESSION['senha'] = "123";



 if ($_SESSION['anonimo'] == "logado" && $_SESSION['usuario'] != "nick" &&  $_SESSION['senha'] != "123") {
 	unset($_SESSION['usuario']);
 	unset($_SESSION['senha']);
			 header("location:pagina_inicial.php");
 }
		else if ($_SESSION['anonimo'] == "logado" || $_SESSION['usuario'] == "nick" &&  $_SESSION['senha'] == "123") 
			{
			 header("location:pagina_inicial.php");

		}else if(isset($_SESSION['anonimo']) == "deslogado"){
			unset($_SESSION['anonimo']);
				if ($_SESSION['anonimo'] == null  || $_SESSION['usuario'] == "nick" &&  $_SESSION['senha'] == "123" ) {	
			 header("location:pagina_inicial.php");
				}
					if ($_SESSION['anonimo'] == null  && $_SESSION['usuario'] != "nick" &&  $_SESSION['senha'] != "123" ) {
						header("location:login.php");
					}
	}else if ($_SESSION['anonimo'] == "logado" || $_SESSION['usuario'] == "nick" &&  $_SESSION['senha'] == "123" ) {
		echo "todos os usuarios estao logados";
	}
?>
 
