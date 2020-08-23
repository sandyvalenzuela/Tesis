<?php

if(count($_POST)>0){
	$nacionalidad = new nacionalidadData();
	$nacionalidad->nacionalidad = $_POST["nacionalidad"];
	$nacionalidad->add();
	
print "<script>window.location='index.php?view=nacionalidad';</script>";


}


?>