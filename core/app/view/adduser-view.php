<?php

if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	$user = new UserData();
	$user->name = $_POST["NombreUsuario"];
	$user->lastname = $_POST["ApellidoUsuario"];
	$user->username = $_POST["Usuario"];
	$user->email = $_POST["email"];
	$user->is_admin=$is_admin;
	$user->password = sha1(md5($_POST["Password"]));
	$user->add();

print "<script>window.location='index.php?view=users';</script>";


}


?>