<?php

if(count($_POST)>0){
	$Producto = LibrosData::getById($_POST["IdProducto"]);
	$Producto->nombre = $_POST["NombreProducto"];
	$Producto->IdCategoria = $_POST["IdCategoria"];
	$Producto->IdPresentacion = $_POST["IdPresentacion"];
	$Producto->Cantidad = $_POST["Cantidad"];
	$Producto->update();
	
	


print "<script>window.location='index.php?view=Producto';</script>";


}


?>