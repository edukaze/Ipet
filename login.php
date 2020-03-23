<?php 
	session_start();
	$_SESSION['anonimo'] = "logado";
	 $_SESSION['usario'] ="nick";
	 $_SESSION['senha'] = "123";

include 'login.html';
?>
