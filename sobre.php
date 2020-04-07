<?php
session_start();

?>
<?php  

if (isset($_SESSION['anonimo'])) {
	include 'header01.html';
	include 'sobre.html';
}
	elseif (isset($_SESSION['usuario'])) {
		include 'header02.html';
		include 'sobre.html';
}
 ?>


