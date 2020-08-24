<?php

$autor = AutorData::getById($_GET["id"]);
$autor->delById($_GET["id"]);
print "<script>window.location='index.php?view=autor';</script>";


?>