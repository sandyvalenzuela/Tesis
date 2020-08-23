<?php

if(count($_POST)>0){
	$nacionalidad = nacionalidadData::getById($_POST["nacionalidad_id"]);
	$nacionalidad->nacionalidad = $_POST["nacionalidad"];
	$nacionalidad->update();
	
	


print "<script>window.location='index.php?view=autor';</script>";


}


?>