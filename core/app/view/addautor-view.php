<?php

if(count($_POST)>0){
	$autor = new AutorData();
	$autor->nombre = $_POST["nombre"];
	$autor->apellido = $_POST["apellido"];
	$autor->nacionalidad = $_POST["nacionalidad_id"];
	$autor->add();
	
print "<script>window.location='index.php?view=autor';</script>";


}


?>