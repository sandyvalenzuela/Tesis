<?php

if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	$Usuario = UsuarioData::getById($_POST["Usuario_id"]);
	$Usuario->nombre = $_POST["nombre"];
	$Usuario->apellido = $_POST["apellido"];
	$Usuario->username = $_POST["username"];
	$Usuario->email = $_POST["email"];
	$Usuario->is_admin=$is_admin;
	$Usuario->is_active=$is_active;
	$Usuario->update();

	if($_POST["password"]!=""){
		$Usuario->password = sha1(md5($_POST["password"]));
		$Usuario->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}

print "<script>window.location='index.php?view=Usuarios';</script>";


}


?>