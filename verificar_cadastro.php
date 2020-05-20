<?php 
session_start();
include 'conexao.php';

$nome =  mysqli_real_escape_string($conexao, trim($_POST['u-nome']));
$sobrenome =  mysqli_real_escape_string($conexao, trim($_POST['u-sobrenome']));
$usuario =  mysqli_real_escape_string($conexao, trim($_POST['u-usuario']));
$email =  mysqli_real_escape_string($conexao, trim($_POST['u-email']));
$senha =  mysqli_real_escape_string($conexao, trim(md5($_POST['u-senha'])));
$conf_senha =  mysqli_real_escape_string($conexao, trim(md5($_POST['u-conf-senha'])));
$num =  mysqli_real_escape_string($conexao, trim($_POST['u-contato']));
include 'funcoes.php';

if (empty($nome) ||  empty($sobrenome) || empty($usuario) || empty($email) || empty($senha) || empty($conf_senha) || empty($num)){
	$_SESSION['erro-campo'] = true;
	header("location:cadastro_usuario.php");
	exit(); 
}
	elseif (validar($padrao_numero, $num) === false) {
		$_SESSION['erro-contato'] = true;
		header("location:cadastro_usuario.php");
		exit();
	}
	elseif(validar($padrao_email,$email) === false){
		$_SESSION['erro-email'] = true;
		header("location:cadastro_usuario.php");
		exit(); 
	}
	elseif (strlen($nome) > 20) {
		$_SESSION['erro-nome'] = true;
		header("location:cadastro_usuario.php");
		exit();
		}
	elseif(validar($padrao_nome, $nome) === false){
		$_SESSION['erro-nome-char'] = true;
		header("location:cadastro_usuario.php");
		exit();
	}
	elseif(strlen($sobrenome) > 25){
		$_SESSION['erro-sobrenome'] = true;
		header("location:cadastro_usuario.php");
		exit();
	}
	elseif(validar($padao_sobrenome, $sobrenome) === false){
		$_SESSION['erro-sobrenome-char'] = true;
		header("location:cadastro_usuario.php");
		exit();
	}
	elseif(strlen($senha) < 8){
		$_SESSION['erro-senha'] = true;
		header("location:cadastro_usuario.php");
		exit();
	}
	elseif($senha != $conf_senha){
		$_SESSION['erro-conf-senha'] = true;
		header("location:cadastro_usuario.php");
		exit();
	}


$sql = "select count(*) as total from usuario where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro_usuario.php');
	exit;
}
$sql = "INSERT INTO usuario (nome, sobrenome, usuario, senha, email, data_cadastro, contato) VALUES ('$nome', '$sobrenome', '$usuario', '$senha', '$email', NOW(), '$num')";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro_usuario.php');
exit;
 ?>
