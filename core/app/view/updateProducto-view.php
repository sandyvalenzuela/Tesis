<?php

if(count($_POST)>0){
	$producto = ProductoData::getById($_POST["producto_id"]);

	$producto->codigo = $_POST["codigo"];
	$producto->nombre = $_POST["nombre"];
  $producto->descripcion = $_POST["descripcion"];
  $producto->presentacion = $_POST["presentacion"];
  $categoria_id="NULL";
  if($_POST["categoria_id"]!=""){ $categoria_id=$_POST["categoria_id"];}

  $is_active=0;
  if(isset($_POST["is_active"])){ $is_active=1;}

  $producto->is_active=$is_active;
  $producto->categoria_id=$categoria_id;

	$producto->Usuario_id = $_SESSION["Usuario_id"];
	$producto->update();

	if(isset($_FILES["image"])){
		$image = new Upload($_FILES["image"]);
		if($image->uploaded){
			$image->Process("storage/productos/");
			if($image->processed){
				$product->image = $image->file_dst_name;
				$product->update_image();
			}
		}
	}

	setcookie("prdupd","true");
	print "<script>window.location='index.php?view=editProducto&id=$_POST[Producto_id]';</script>";


}


?>