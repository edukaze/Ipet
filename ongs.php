<?php 
	session_start();
	$_SESSION['anonimo'] = "deslogado";
	 $_SESSION['usario'] ="nick";
	 $_SESSION['senha'] = "123";

if ($_SESSION['anonimo'] == "logado" && $_SESSION['usuario'] != "nick" &&  $_SESSION['senha'] != "123") {
 	unset($_SESSION['usuario']);
 	unset($_SESSION['senha']);
			 include 'header01.html';
			 include 'ongs.html';
 }
		else if ($_SESSION['anonimo'] == "logado" || $_SESSION['usuario'] == "nick" &&  $_SESSION['senha'] == "123") 
			{
			include 'header01.html';
			include 'ongs.html';

		}else if(isset($_SESSION['anonimo']) == "deslogado"){
			unset($_SESSION['anonimo']);
				if ($_SESSION['anonimo'] == null  || $_SESSION['usuario'] == "nick" &&  $_SESSION['senha'] == "123" ) {	
			 include  'header02.html';
			include 'ongs.html';
				}
					if ($_SESSION['anonimo'] == null  && $_SESSION['usuario'] != "nick" &&  $_SESSION['senha'] != "123" ) {
						header("location:login.php");
					}
	}else if ($_SESSION['anonimo'] == "logado" || $_SESSION['usuario'] == "nick" &&  $_SESSION['senha'] == "123" ) {
		echo "todos os usuarios estao logados";
	}
 ?>




