<?php

$Categoria = CategoriaData::getById($_GET["id"]);
$Productos = ProductoData::getAllByCategoriaId($Categoria->id);
foreach ($Productos as $Producto) {
	$Producto->del_Categoria();
}

$Categoria->del();
Core::redir("./index.php?view=Categorias");


?>

