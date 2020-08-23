<?php

$nacionalidad = nacionalidadData::getById($_GET["id"]);
$nacionalidad->delById($_GET["id"]);
print "<script>window.location='index.php?view=nacionalidad';</script>";


?>