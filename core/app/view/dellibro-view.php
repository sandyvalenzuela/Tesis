<?php

$libro = LibrosData::getById($_GET["id"]);
$libro->delById($_GET["id"]);
print "<script>window.location='index.php?view=libros';</script>";


?>