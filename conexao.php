<?php
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '#Kaze93954714');
define('DB', 'ipet');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');