<?php

$categoria = CategoriaData::getById($_GET["id"]);
//$Productos = ProductoData::getAllByCategoriaId($categoria->id);
//foreach ($Productos as $Producto) {
//	$Producto->del();
//}
$categoria->del();
Core::redir("./index.php?view=Categorias");


?>

