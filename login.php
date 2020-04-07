<?php
session_start();

?>
<?php  

if (isset($_SESSION['anonimo'])) {
	include 'login.html';
}
	elseif (isset($_SESSION['usuario'])) {
		unset($_SESSION['usuario']);
		$_SESSION['anonimo'] = true;
		include 'login.html';

}
 ?>