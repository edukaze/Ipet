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
   