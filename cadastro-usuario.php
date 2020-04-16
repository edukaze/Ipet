<?php //criando a sessão
session_start();

?>
<?php  

if (isset($_SESSION['anonimo'])) {
	include 'cadastro-usuario.html';
}
	elseif (isset($_SESSION['usuario'])) {
		unset($_SESSION['usuario']);
		$_SESSION['anonimo'] = true;
		include 'cadastro-usuario.html';

}
 ?>