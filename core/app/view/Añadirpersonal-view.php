<?php

if(count($_POST)>0){
	$Usuario = new PersonaData();
	$Usuario->nombre = $_POST["nombre"];
	$Usuario->apellido = $_POST["apellido"];
	$Usuario->direccion = $_POST["direccion"];
	$Usuario->email = $_POST["email"];
	$Usuario->telefono = $_POST["telefono"];
	$Usuario->add_Personal();

print "<script>window.location='index.php?view=Personals';</script>";


}


?>