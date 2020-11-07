<?php 
session_start();
include 'banco.php';

if (isset($_SESSION['id_usuario'])) {


	$usuario = $_POST['u-usuario'];
	$senha = $_POST['u-senha'];
	$conf_senha = $_POST['u-conf-senha'];
	$contato = $_POST['u-contato'];
	$senhaSegura = password_hash($senha, PASSWORD_DEFAULT);
	$_SESSION['cadastro_usuario'] = $_POST;

include 'funcoes.php';
	if ( empty($usuario) || empty($senha) || empty($conf_senha) || empty($contato)){
	$_SESSION['erro-campo'] = true;
	header("location:alterar-perfil.php");
	exit();
	}
	elseif (validar($padrao_numero, $contato) === false) {
	$_SESSION['erro-contato'] = true;
	header("location:alterar-perfil.php");
	exit();
	}
	elseif(strlen($senha) < 8){
	$_SESSION['erro-senha'] = true;
	header("location:alterar-perfil.php");
	exit();
	}
	elseif($senha != $conf_senha){
	$_SESSION['erro-conf-senha'] = true;
	header("location:alterar-perfil.php");
	exit();
	}
	unset($_SESSION['cadastro_usuario']);

	$pdo = dbConnect();

	$verificandoExistencia = $pdo->prepare("
	SELECT COUNT(*) AS TOTAL FROM IPET_USUARIO_NORMAL
	WHERE NOR_USUARIO = ?;
	");
	$verificandoExistencia->execute([$usuario]);
	$row = $verificandoExistencia->fetchAll();


	if($row[0]['TOTAL'] == 1) {
		$query  = $pdo->prepare("
		UPDATE IPET_USUARIO_NORMAL SET NOR_SENHA =?, NOR_CONTATO = ? 
		WHERE NOR_CODIGO=?; 
	");
		$query->execute([$senhaSegura, $contato,$_SESSION['id_usuario'] ]);
	$_SESSION['upadate'] = true;
	header('Location: alterar-perfil.php');
	exit();
	}
	elseif ($row[0]['TOTAL']  == 0) {
	
	$query1  = $pdo->prepare("
		UPDATE IPET_USUARIO_NORMAL SET NOR_USUARIO, NOR_SENHA =?, NOR_CONTATO = ? 
		WHERE NOR_CODIGO=?; 
	");
	$query1->execute([$usuario ,$senhaSegura, $contato,$_SESSION['id_usuario']]);
	$_SESSION['upadate'] = true;
	header('location: alterar-perfil.php');
	exit();
	}
	elseif ($row[0]['TOTAL']  > 1) {
	
	$_SESSION['usuario_existe'] = true;
	header('location: alterar-perfil.php');
	exit();
	}	
}
 ?>