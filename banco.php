<?php

function dbConnect(){
	try {
		$dsn = 'mysql:dbname=' . 'projeto' . ';host=' . 'localhost' . ';port=' . 3306 . ';charset=utf8';

		$pdo = new PDO($dsn, 'root', '#Kaze93954714');

		return $pdo;
	} catch (PDOException $e) {
		echo 'Erro ao conectar com o MySql: ' . $e->getMessage();
	}
}
var_dump(dbconnect());
?>