<?php

if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	$Usuario = new UsuarioData();
	$Usuario->nombre = $_POST["nombre"];
	$Usuario->apellido = $_POST["apellido"];
	$Usuario->username = $_POST["username"];
	$Usuario->email = $_POST["email"];
	$Usuario->is_admin=$is_admin;
	$Usuario->password = sha1(md5($_POST["password"]));
	$Usuario->add();

print "<script>window.location='index.php?view=Usuarios';</script>";


}


?>