<?php


if(isset($_SESSION["Usuario_id"])){
	$Usuario = UserData::getById($_SESSION["Usuario_id"]);
	$password = sha1(md5($_POST["password"]));
	if($password==$Usuario->password){
		$Usuario->password = sha1(md5($_POST["newpassword"]));
		$Usuario->update_passwd();
		setcookie("password_updated","true");
		print "<script>window.location='logout.php';</script>";
	}else{
		print "<script>window.location='index.php?view=security&msg=invalidpasswd';</script>";		
	}

}else {
		print "<script>window.location='index.php';</script>";
}


?>