<?php 
var_dump($_FILES['imagem']);

$diretorio ='imagens/'.$ultimo_id.'/';
mkdir($diretorio, 0755);
var_dump($diretorio);


move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nome_imagem);
 ?>