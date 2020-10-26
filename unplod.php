<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	if ($msg != false) {
	 echo "<p>$msg</p>";
	 } ?>
	<div>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">

			<input type="file" name="arquivo"><br>
			<input type="submit" value="SALVAR">
			
		</form>
	</div>

</body>
</html>


<?php 

include("banco.php");

 $msg = false;

 if (isset($_FILES['arquivo'])) {
 		$nome = strtolower(substr($_FILES['arquivo']['name'], -4));
 		$novo_nome = md5(time()) . $nome;
 		$diretorio = "upload/";

 		move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
 		$sql_code = "INSERT INTO ipet_especie(ESP_ID,ESP_CACHORRO,ESP_GATO,ESP_COELHO,ESP_ROEDOR,ESP_PASSARO,ESP_TARTARUGA,ESP_PEIXE)VALUES(null, '$novo_nome',NOW())";
 		$mysqli -> query($sql_code);
 }



 ?>
