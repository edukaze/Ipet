<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php 
session_start();
include 'banco.php';


//$resultado= $pdo->prepare('SELECT * FROM IPET_USUARIOS_ONG WHERE ONG_ID'); 
//$resultado->execute($_SESSION['ONG_ID']);
//$brasil = $resultado->fetchAll();

 $r = "SELECT * FROM IIPET_USUARIOS_ONG"; 

$resultado= $pdo->prepare($r); 
$resultado->execute();
while ($go = $resultado ->  fetch(PDO::FETCH_ASSOC)) {
echo "Nome:". $go['ONG_ID'] . "<br>";
echo "Nome:". $go['ONG_NOME'] . "<br>";
echo "Descrição:".$go['ONG_DESCRICAO']."<br>"; 
echo "Cnpj:". $go['ONG_CNPJ'] . "<br>";
echo "Email:". $go['ONG_EMAIL '] . "<br>";
echo "Telefone:". $go['ONG_TELEFONE'] . "<br>";
echo "Instagram:". $go['ONG_INSTAGRAM'] . "<br>";
echo "Facebook:". $go['ONG_FACEBOOK'] . "<br>";
echo "Usuario:". $go['ONG_USUARIO '] . "<br>";
?>	

<a href="lista.php"></a>
</body>
</html>