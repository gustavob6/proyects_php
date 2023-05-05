<?php
	try{
	 $conn = new PDO("mysql:host=localhost;dbname=nutricionista1;", 'root', '67*67*Gb');
	 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 $conn->exec("SET CHARACTER SET utf8mb4");
	}catch (PDOException $e) {
	  	die('Connection Failed: ' . $e->getMessage());
	}
?>
