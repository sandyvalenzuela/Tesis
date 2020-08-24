<?php

if(count($_POST)>0){
	$Producto = new ProductoData();
	$Producto->NombreProducto = $_POST["NombreProducto"];
	$Producto->IdCategoria = $_POST["IdCategoria"];
	$Producto->IdPresentacion = $_POST["IdPresentacion"];
	$Producto->Cantidad = $_POST["Cantidad"];
	$Producto->user_id = $_SESSION["user_id"];
	$Producto->add();
	
print "<script>window.location='index.php?view=Producto';</script>";


}


?>


