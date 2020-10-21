<?php
include "banco.php";

$cnpj = $_POST['o-cnpj'];
$usuario = $_POST['o-usuario'];
$facebook = $_POST['o-facebook'];
$instagram = $_POST['o-instagram'];
$email = $_POST['o-email'];
$telefone = $_POST['o-telefone'];
$nome = $_POST['o-nome-ong'];
$senha = $_POST['o-senha'];
$conf_senha = $_POST['o-conf_senha']
$descricao = $_POST['o-descricao'];

if (empty($cnpj) ||  empty($usuario) || empty($facebook) || empty($instagram) || empty($email) || empty($telefone) || empty($nome)
|| empty($senha) || empty($conf_senha) || empty($descrição)){
	$_SESSION['erro-campo'] = true;
	header("location:cadastro_ongs.php");
	exit(); 
}
   elseif (strlen($cnpj) < 14){
    	$_SESSION['error-cnpj'] = true;
    	header("location:cadastro_ongs.php");
    }
	elseif (validar($padrao_numero, $telefone) === false) {
		$_SESSION['erro-contato'] = true;
		header("location:cadastro_ongs.php");
		exit();
	}
	elseif(validar($padrao_email,$email) === false){
		$_SESSION['erro-email'] = true;
		header("location:cadastro_ongs.php");
		exit(); 
	}
	elseif (strlen($nome) > 20) {
		$_SESSION['erro-nome'] = true;
		header("location:cadastro_ongs.php");
		exit();
		}
	elseif(validar($padrao_nome, $nome) === false){
		$_SESSION['erro-nome-char'] = true;
		header("location:cadastro_ongs.php");
		exit();
	}
	elseif(strlen($$padrao_facebook,$facebook){
		$_SESSION['erro-facebook'] = true;
		header("location:cadastro_ongs.php");
		exit();
	}
	elseif(validar($padrao_instagram,$instagram) === false){
		$_SESSION['erro-instagram'] = true;
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