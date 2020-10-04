<?php

if(count($_POST)>0){
	$Usuario = new ClinicaData();
	$Usuario->codigo = $_POST["codigo"];
	$Usuario->nombre = $_POST["nombre"];
	$Usuario->add();

print "<script>window.location='index.php?view=Clinicas';</script>";


}


?>