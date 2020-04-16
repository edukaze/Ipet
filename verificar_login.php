<?php //criando a sessão
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
<?php 
//parte da área de login 
$nome = $_POST['t-usuario'];
$senha = $_POST['t-senha'];
?>

<?php if(empty($nome) || empty($senha)): ?>
	<?php echo "<div class ='erro'><h1>Por favor preenchar todos os campos</h1><div>"; ?>
<?php endif ?>

<?php if(strlen($senha) < 8): ?>
	<?php echo "<div class = 'erro'><h1>O senha deve no minimo ter 8 digitos<h1><div>"; ?>
<?php endif ?>