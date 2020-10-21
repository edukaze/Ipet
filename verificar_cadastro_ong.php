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



?>