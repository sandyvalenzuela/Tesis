<?php

$Presentacion = PresentacionData::getById($_GET["IdPresentacion"]);
$Presentacion->delById($_GET["IdPresentacion"]);
print "<script>window.location='index.php?view=Presentacion';</script>";


?>