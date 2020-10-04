<?php

$Personal = PersonaData::getById($_GET["id"]);
$Personal->del();
Core::redir("./index.php?view=Personals");

?>