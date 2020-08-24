<?php

if(count($_POST)>0){
	$is_admin=0;
	if(isset($_POST["is_admin"])){$is_admin=1;}
	$is_active=0;
	if(isset($_POST["is_active"])){$is_active=1;}
	$user = UserData::getById($_POST["user_id"]);
	$user->name = $_POST["NombreUsuario"];
	$user->lastname = $_POST["ApellidoUsuario"];
	$user->username = $_POST["Usuario"];
	$user->email = $_POST["email"];
	$user->is_admin=$is_admin;
	$user->is_active=$is_active;
	$user->update();

	if($_POST["Password"]!=""){
		$user->password = sha1(md5($_POST["Password"]));
		$user->update_passwd();
print "<script>alert('Se ha actualizado el Password');</script>";

	}

print "<script>window.location='index.php?view=users';</script>";


}


?>