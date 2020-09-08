<?php

if(count($_POST)>0){
	$Usuario = new CategoriaData();
	$Usuario->nombre = $_POST["nombre"];
	$Usuario->add();

print "<script>window.location='index.php?view=Categorias';</script>";


}


?>