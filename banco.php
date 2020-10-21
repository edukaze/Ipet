<?php

function dbConnect(){
	try {
		$dsn = 'mysql:dbname=' . 'projeto' . ';host=' . 'localhost' . ';port=' . 3306 . ';charset=utf8';

		$pdo = new PDO($dsn, 'ipet', 'Ipet@2020');

		return $pdo;
	} catch (PDOException $e) {
		echo 'Erro ao conectar com o MySql: ' . $e->getMessage();
	}
}

?>