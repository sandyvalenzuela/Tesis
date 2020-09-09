<?php

$Categoria = Categoriadata::getById($_GET["id"]);
$Productos = ProductoData::getAllByCategoriaId($categoria->id);
foreach ($Productos as $Producto) {
	$Producto->del_Categoria();
}

$category->del();
Core::redir("./index.php?view=Categorias");


?>