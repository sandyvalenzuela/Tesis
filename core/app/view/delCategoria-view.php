<?php

$Categoria = Categoriadata::getById($_GET["id"]);
$Productos = ProductoData::getAllByCategoriaId($Categoria->id);
foreach ($Productos as $Producto) {
	$Producto->del_Categoria();
}

$category->del();
Core::redir("./index.php?view=Categorias");


?>