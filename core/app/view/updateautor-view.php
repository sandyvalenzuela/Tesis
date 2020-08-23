<?php

if(count($_POST)>0){
	$autor = AutorData::getById($_POST["autor_id"]);
	$autor->nombre = $_POST["nombre"];
	$autor->apellido = $_POST["apellido"];
	$autor->nacionalidad = $_POST["nacionalidad_id"];
	$autor->update();
	
	


print "<script>window.location='index.php?view=autor';</script>";


}


?>