<?php

if(count($_POST)>0){
	$Presentacion = PresentacionData::getById($_POST["IdPresentacion"]);
	$Presentacion->nombrePresentacion = $_POST["nombrePresentacion"];
	$Presentacion->update();
	
	


print "<script>window.location='index.php?view=Presentacion';</script>";


}


?>