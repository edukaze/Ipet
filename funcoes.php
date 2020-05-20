<?php 
session_start();
?>
<?php 
$padrao_numero = "/^\([0-9]{2}\) [9]{1} [0-9]{4}\-[0-9]{4}$/";
$padrao_email= "/^[a-zA-Z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/";
$padrao_nome = "/^[a-zA-Z]+$/";
$padao_sobrenome = "/^[a-zA-Z]+$/";
$padrao_facebook = "/^facebook\.com\/[a-zA-Z0-9_\.\-]+$/";

function validar($padrao, $var)
{
	if(preg_match($padrao, $var)){
		return true;
	}
	else{
		return false;
	}
}
 ?>