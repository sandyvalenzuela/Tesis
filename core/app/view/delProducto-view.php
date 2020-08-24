<?php

$Producto = ProductoData::getById($_GET["IdProducto"]);
$Producto->delById($_GET["IdProducto"]);
print "<script>window.location='index.php?view=Producto';</script>";


?>