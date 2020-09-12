<?php

if(count($_POST)>0){
	$Usuario = new PersonaData();
	$Usuario->nombre = $_POST["nombre"];
	$Usuario->apellido = $_POST["apellido"];
	$Usuario->direccion = $_POST["direccion"];
	$Usuario->email = $_POST["email"];
	$Usuario->telefono = $_POST["telefono"];
	$Usuario->add_cliente();

print "<script>window.location='index.php?view=clientes';</script>";


}


?>