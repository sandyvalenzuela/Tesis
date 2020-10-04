<?php
session_start();
// ---
// la tarea de este archivo es eliminar todo rastro de cookie

// -- eliminamos el usuario
if(isset($_SESSION['Usuario_id'])){
	unset($_SESSION['Usuario_id']);
}

session_destroy();
//estemos donde estemos nos redirije al index
print "<script>window.location='./';</script>";
?>