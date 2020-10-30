<!DOCTYPE html>
<html>
<head>
	<title>ONG'S </title>
</head>
<body>



<?php 

include 'banco.php';
 $r = "SELECT * FROM IPET_USUARIOS_ONG ORDER BY ONG_NOME ASC"; 

$resultado= $pdo->prepare($r); 
$resultado->execute();

//while ($a = $resultado ->  fetch(PDO::FETCH_ASSOC)) {
//echo "NOME:". $a['ONG_NOME'] . "<br>";
//echo "Descrição:".$a['ONG_DESCRICAO']."<br>"; 	

//}

 ?>
<table>
	<th>ONG'S</th>
	<?php foreach ($resultado as $result):?>

	<td><?=$result['ONG_NOME']?><a href="ong.php<?$go['ONG_ID']?>"></a></td>
	<td><?=$result['ONG_DESCRICAO']?></td>
</table>
      
</body>
</html>