<?php

$Usuario = UsuarioData::getById($_GET["id"]);
$Usuario->del();
Core::redir("./index.php?view=Usuarios");

?>

