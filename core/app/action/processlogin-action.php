<?php

if(!isset($_SESSION["Usuario_id"])) {
$Usuario = $_POST['username'];
$pass = sha1(md5($_POST['password']));

$base = new Database();
$con = $base->connect();
 $sql = "select * from Usuario where (email= \"".$Usuario."\" or username= \"".$Usuario."\") and password= \"".$pass."\" and is_active=1";

$query = $con->query($sql);
$found = false;
$Usuarioid = null;
while($r = $query->fetch_array()){
	$found = true ;
	$Usuarioid = $r['id'];
}

if($found==true) {

	$_SESSION['Usuario_id']=$Usuarioid ;

	print "Cargando ... $Usuario";
	print "<script>window.location='index.php?view=Home';</script>";
}else {
	print "<script>window.location='index.php?view=Login';</script>";
}

}else{
	print "<script>window.location='index.php?view=Home';</script>";
	
}
?>