<?php

$Usuarios = UsuarioData::getById($_GET["id"]);
$Usuarios->del();
Core::redir("./index.php?view=Usuarios");

?>

