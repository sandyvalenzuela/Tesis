<?php
session_start();

// la tarea de este archivo es eliminar todo rastro de cookie


if(isset($_SESSION['user_id'])){
	unset($_SESSION['user_id']);
}

session_destroy();

print "<script>window.location='./';</script>";
?>