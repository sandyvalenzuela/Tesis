<?php

if(count($_POST)>0){
	$Producto = ProductoData::getById($_POST["Producto_id"]);

	$Producto->codigo = $_POST["codigo"];
	$Producto->nombre = $_POST["nombre"];	
  $Producto->descripcion = $_POST["descripcion"];
  $Producto->presentacion = $_POST["presentacion"];
  $categoria_id="NULL";
  if($_POST["categoria_id"]!=""){ $categoria_id=$_POST["categoria_id"];}

  $is_active=0;
  if(isset($_POST["is_active"])){ $is_active=1;}

  $Producto->is_active=$is_active;
  $Producto->categoria_id=$categoria_id;

	$Producto->Usuario_id = $_SESSION["Usuario_id"];
	$Producto->update();

	if(isset($_FILES["image"])){
		$image = new Upload($_FILES["image"]);
		if($image->uploaded){
			$image->Process("Imagenes/Productos/");
			if($image->processed){
				$Producto->image = $image->file_dst_name;
				$Producto->update_image();
			}
		}
	}

	setcookie("prdupd","true");
	print "<script>window.location='index.php?view=Producto&id=$_POST[Producto_id]';</script>";


}


?>