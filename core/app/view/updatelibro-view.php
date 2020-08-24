<?php

if(count($_POST)>0){
	$libro = LibrosData::getById($_POST["libro_id"]);
	$libro->nombre = $_POST["nombre"];
	$libro->autor_id = $_POST["autor_id"];
	$libro->anio_edicion = $_POST["sd"];
	$libro->update();
	
	


print "<script>window.location='index.php?view=libros';</script>";


}


?>