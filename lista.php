<!DOCTYPE html>
<html>
<head>
	<title>ONG'S </title>
</head>
<body>

</body>
</html>

<?php 
include 'banco.php';
 $r = "SELECT * FROM IPET_USUARIOS_ONG ORDER BY ONG_NOME ASC"; 

$resultado= $pdo->prepare($r); 
$resultado->execute();

while ($a = $resultado ->  fetch(PDO::FETCH_ASSOC)) {
echo "NOME:". $a['ONG_NOME'] . "<br>";
echo "DESCRIÇÃO:".$a['ONG_DESCRICAO']."<br>";


}

 ?>
