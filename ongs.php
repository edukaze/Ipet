<?php
session_start();

?>
<?php  

if (isset($_SESSION['anonimo'])) {
	header("location:login.php");
}
	elseif (isset($_SESSION['usuario'])) {
		include 'header02.html';
		include_once 'ongs.html';
}

 ?>


