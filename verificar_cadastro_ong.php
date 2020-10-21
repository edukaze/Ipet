$pdo = dbConnect();

$verificandoExistencia = $pdo->prepare("
		SELECT COUNT(*) AS TOTAL FROM IPET_USUARIO_ONG
		WHERE ONG_USUARIO = ?;
	");
$verificandoExistencia->execute([$usuario]);
$row = $verificandoExistencia->fetchAll();


	if($row[0]['TOTAL'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro_ongs.php');
	exit();
}
elseif ($row[0]['TOTAL']  != 1) {
	
$stmt = $pdo->prepare("
    INSERT INTO ipet_usuarios_ong (ONG_CNPJ, ONG_USUARIO, ONG_FACEBOOK, ONG_INSTAGRAM, ONG_EMAIL, ONG_TELEFONE, ONG_NOME, ONG_SENHA, ONG_CONF_SENHA, ONG_DESCRICAO)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");
$stmt->execute([$cnpj, $usuario, $facebook, $instagram, $email, $telefone, $nome, $senha, $conf_senha, $descricao]);

	$_SESSION['status_cadastro'] = true;
	header('location: cadastro_ongs.php');

	exit;

}
<<<<<<< HEAD



?>
=======
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
>>>>>>> e4b26dead2dd36f45fd528b29cdcf95cbfccb214
