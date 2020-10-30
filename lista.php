<!DOCTYPE html>
<html>
<head>
	<title>ONG'S </title>
</head>
<body>



<?php 
session_start();
include 'banco.php';


$resultado= $pdo->prepare('SELECT * FROM IPET_USUARIOS_ONG WHERE ONG_ID'); 
$resultado->execute($_SESSION['ONG_ID']);
$brasil = $resultado->fetchAll();

//while ($a = $resultado ->  fetch(PDO::FETCH_ASSOC)) {
//echo "NOME:". $a['ONG_NOME'] . "<br>";
//echo "Descrição:".$a['ONG_DESCRICAO']."<br>"; 	

//}

 ?>
<table>
	<th>ONG'S</th>
	<?php foreach ($resultado as $result):?>

	<td><?=$result['ONG_NOME']?></td>
	<td><?=$result['ONG_DESCRICAO']?></td>
	<td>
	 <a href="ong.php<?$go['ONG_ID']?>">IR PARA O PERFIL DA ONG</a></td>
</table>
      
</body>
</html>