<?php

$Operaciones = OperacionData::getAllByProductoId($_GET["id"]);

foreach ($Operaciones as $op) {
	$op->del();
}

$Producto = ProductoData::getById($_GET["id"]);
$Producto->del();

Core::redir("./index.php?view=Productos");
?>