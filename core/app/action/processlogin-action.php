<?php

if(!isset($_SESSION["user_id"])) {
$user = $_POST['Usuario'];
$pass = $_POST['Password'];

$base = new Database();
$con = $base->connect();
 $sql = "select * from Usuario where (email= \"".$user."\" or Usuario= \"".$user."\") and Password= \"".$pass."\" and is_active=1";

$query = $con->query($sql);
$found = false;
$userid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$userid = $r['IdUsuario'];
}

if($found==true) {

	$_SESSION['user_id']=$userid ;
	print "Cargando ... $user";
	print "<script>window.location='index.php?view=home';</script>";
}else {
	print "<script>window.location='index.php?view=login';</script>";
}

}else{
	print "<script>window.location='index.php?view=home';</script>";
	
}
?>