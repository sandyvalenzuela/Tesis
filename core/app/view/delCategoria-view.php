<?php

$Categoria = CategoriaData::getById($_GET["IdCategoria"]);
$Categoria->delById($_GET["IdCategoria"]);
print "<script>window.location='index.php?view=Categoria';</script>";


?>