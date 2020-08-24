<?php

if(count($_POST)>0){
	$libro = new LibrosData();
	$libro->nombre = $_POST["nombre"];
	$libro->autor_id = $_POST["autor_id"];
	$libro->anio_edicion = $_POST["sd"];
	$libro->user_id = $_SESSION["user_id"];
	$libro->add();
	
print "<script>window.location='index.php?view=libros';</script>";


}


?>