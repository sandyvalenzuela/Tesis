<?php

if(count($_POST)>0){
	$Usuario = ClinicaData::getById($_POST["Usuario_id"]);
	$Usuario->codigo = $_POST["codigo"];
	$Usuario->nombre = $_POST["nombre"];
	$Usuario->update();


print "<script>window.location='index.php?view=Clinicas';</script>";


}


?>
