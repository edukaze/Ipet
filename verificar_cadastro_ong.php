<?php 
session_start();
include 'conexao.php';


$nome =  mysqli_real_escape_string($conexao, trim($_POST['o-nome']));
$sobrenome =  mysqli_real_escape_string($conexao, trim($_POST['o-sobrenome']));
$usuario =  mysqli_real_escape_string($conexao, trim($_POST['o-usuario']));
$nome_ong =  mysqli_real_escape_string($conexao, trim($_POST['o-nome-ong']));
$senha =  mysqli_real_escape_string($conexao, md5(trim($_POST['o-senha'])));
$conf_senha = mysqli_real_escape_string($conexao, md5(trim($_POST['o-conf-senha'])));
$fb =  mysqli_real_escape_string($conexao, trim($_POST['o-facebook']));
 
 include 'funcoes.php';


if (empty($nome) || empty($sobrenome) || empty($usuario) || empty($nome_ong) || empty($senha) || empty($conf_senha)){
	$_SESSION['erro-campo'] = true;
	header("location:cadastro_ongs.php");
	exit(); 
}
 elseif (strlen($nome) > 20) {
		$_SESSION['erro-nome'] = true;
		header("location:cadastro_ongs.php");
		exit();
	}
 elseif(strlen($sobrenome) > 20){
		$_SESSION['erro-sobrenome'] = true;
		header("location:cadastro_ongs.php");
		exit();
	}
 elseif(strlen($nome_ong) > 50){
		$_SESSION['erro-nome-ong'] = true;
		header("location:cadastro_ongs.php");
		exit();
	}
 elseif(validar($padrao_facebook, $bf)){
 		$_SESSION['erro-facebook'] = true;
		header("location:cadastro_ongs.php");
		exit();
 }
 elseif(strlen($senha) < 8){
		$_SESSION['erro-senha'] = true;
		header("location:cadastro_ongs.php");
		exit();
	}
 elseif($senha != $conf_senha){
		$_SESSION['erro-conf-senha'] = true;
		header("location:cadastro_ongs.php");
		exit();
	}


 
$sql = "select count(*) as total from ong where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['ong_existe'] = true;
	header('Location: cadastro_ongs.php');
	exit;
}

$sql = "INSERT INTO ong (nome, sobrenome, nome_ong, senha, data_cadastro, usuario, facebook) VALUES ('$nome', '$sobrenome', '$nome_ong', '$senha', NOW(), '$usuario', '$fb')";


if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro_ongs.php');
exit;

 ?>