<?php
	require_once("database.php");
			
	$registros = array();
		
	$sql = "SELECT * FROM pacientes";
	$registros1=$conn->prepare($sql);
	$registros1->execute(array());
	$registros=$registros1->fetchAll();
?>