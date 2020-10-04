<?php

$Clinica = ClinicaData::getById($_GET["id"]);
$Clinica->del();
Core::redir("./index.php?view=Clinicas");

?>

