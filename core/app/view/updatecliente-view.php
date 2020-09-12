<?php

if(count($_POST)>0){
	$user = PersonaData::getById($_POST["Usuario_id"]);
	$user->nombre = $_POST["nombre"];
	$user->apellido = $_POST["apellido"];
	$user->direccion = $_POST["direcccion"];
	$user->email = $_POST["email"];
	$user->telefono = $_POST["telefono"];
	$user->update_cliente();


print "<script>window.location='index.php?view=clientes';</script>";


}


?>