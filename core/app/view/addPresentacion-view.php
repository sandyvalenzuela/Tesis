<?php

if(count($_POST)>0){
	$Presentacion = new PresentacionData();
	$Presentacion->nombrePresentacion = $_POST["nombrePresentacion"];
	$Presentacion->add();
	
print "<script>window.location='index.php?view=Presentacion';</script>";


}


?>