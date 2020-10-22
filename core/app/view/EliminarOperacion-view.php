<?php

print_r($_GET);

$Operacion = OperacionData::getById($_GET["opid"]);
$Operacion->del();

print "<script>window.location='index.php?view=$_GET[ref]&Producto_id=$_GET[pid]';</script>";

?>