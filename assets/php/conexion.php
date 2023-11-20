<?php
	$servidor = "localhost";
	$usuario = "root";
	$clave = "";
	$bdd = "database";
	
	$con = new mysqli($servidor, $usuario, $clave, $bdd);
	
	if($con->connect_error){
		die("Error conectándose a la Base de Datos: ".$con->connect_error);
	}
?>