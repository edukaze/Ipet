<?php 
session_start();
include 'banco.php';

if (isset($_SESSION['id_usuario'])) {


	$usuario = $_POST['u-usuario'];
	$senha = $_POST['u-senha'];
	$conf_senha = $_POST['u-conf-senha'];
	$contato = $_POST['u-contato'];
	$email = $_POST['u-email'];
	$senhaSegura = password_hash($senha, PASSWORD_DEFAULT);
	$_SESSION['cadastro_usuario'] = $_POST;

include 'funcoes.php';

	if (validar($padrao_numero, $contato) === false) {
	$_SESSION['erro-contato'] = true;
	header("location:alterar-perfil.php");
	exit();
	}
	elseif(validar($padrao_email,$email) === false){
	$_SESSION['erro-email'] = true;
	header("location:cadastro_usuario.php");
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
		UPDATE IPET_USUARIO_NORMAL SET NOR_SENHA =?, NOR_CONTATO = ?, NOR_EMAIL= ?
		WHERE NOR_CODIGO=?; 
	");
		$query->execute([$senhaSegura, $contato,$email, $_SESSION['id_usuario']]);
	$_SESSION['upadate'] = true;
	//header('Location: alterar-perfil.php');
	exit();
	}
	elseif ($row[0]['TOTAL']  == 0) {
	
	$query1  = $pdo->prepare("
		UPDATE IPET_USUARIO_NORMAL SET NOR_USUARIO = ?, NOR_SENHA =?, NOR_CONTATO = ?, NOR_EMAIL = ? 
		WHERE NOR_CODIGO=?; 
	");
	$query1->execute([$usuario , $senhaSegura, $contato, $email, $_SESSION['id_usuario']]);
	$_SESSION['upadate'] = true;
	//header('location: alterar-perfil.php');
	exit();
	}
	elseif ($row[0]['TOTAL']  > 1) {
	
	$_SESSION['usuario_existe'] = true;
	header('location: alterar-perfil.php');
	exit();
	}	
}
elseif (isset($_SESSION['id_ong'])) {
	
	$usuario = $_POST['o-usuario'];
	$senha = $_POST['o-senha'];
	$facebook = $_POST['o-facebook'];
	$instagram = $_POST['o-instagram'];
	$conf_senha = $_POST['o-conf-senha'];
	$telefone = $_POST['o-telefone'];
	$email = $_POST['o-email'];
	$senhaSegura = password_hash($senha, PASSWORD_DEFAULT);
	$_SESSION['cadastro_usuario'] = $_POST;

	include 'funcoes.php';
	if (validar($padrao_numero, $telefone) === false) {
	$_SESSION['erro-contato'] = true;
	header("location:alterar-perfil-ong.php");
	exit();
	}
	elseif(validar($padrao_email,$email) === false){
	$_SESSION['erro-email'] = true;
	header("location:alterar-perfil-ong.php");
	exit(); 
	}
	elseif(validar($padrao_facebook, $facebook) === false){
	$_SESSION['erro-facebook'] = true;
	header("location:alterar-perfil-ong.php");
	exit();
	}
	elseif(validar($padrao_instagram,$instagram) === false){
	$_SESSION['erro-instagram'] = true;
	header("location:alterar-perfil-ong.php");
	exit();
	}
	elseif($senha != $conf_senha){
	$_SESSION['erro-conf-senha'] = true;
	header("location:alterar-perfil-ong.php");
	exit();
	}

	$pdo = dbConnect();

	$verificandoExistencia = $pdo->prepare("
	SELECT COUNT(*) AS TOTAL FROM IPET_USUARIOS_ONG
	WHERE ONG_ID = ?;
	");
	$verificandoExistencia->execute([$usuario]);
	$row = $verificandoExistencia->fetchAll();


	if($row[0]['TOTAL'] == 1) {
		$query  = $pdo->prepare("
		UPDATE IPET_USUARIOS_ONG SET ONG_SENHA =?, ONG_TELEFONE = ?, ONG_EMAIL= ?, ONG_FACEBOOK = ?, ONG_INSTAGRAM = ?
		WHERE ONG_ID=?; 
	");
		$query->execute([$senhaSegura, $telefone, $email, $facebook, $instagram, $_SESSION['id_ong']]);
	$_SESSION['upadate'] = true;
	//header('Location: alterar-perfil.php');
	exit();
	}
	elseif ($row[0]['TOTAL']  == 0) {
	
	$query1  = $pdo->prepare("
	UPDATE IPET_USUARIOS_ONG SET ONG_USUARIO = ?, ONG_SENHA =?, ONG_TELEFONE = ?, ONG_EMAIL= ?, ONG_FACEBOOK = ?, ONG_INSTAGRAM = ?
		WHERE ONG_ID=?; 
	");
	$query1->execute([$usuario , $senhaSegura, $telefone, $email, $facebook, $instagram,$_SESSION['id_ong']]);
	$_SESSION['upadate'] = true;
	//header('location: alterar-perfil.php');
	exit();
	}
	elseif ($row[0]['TOTAL']  > 1) {
	$_SESSION['usuario_existe'] = true;
	header('location: alterar-perfil-ong.php');
	exit();
	}
}
 ?>