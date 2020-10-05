<?php

if(count($_POST)>0){
	$Usuario = CategoriaData::getById($_POST["Usuario_id"]);
	$Usuario->nombre = $_POST["nombre"];
	$Usuario->update_Categoria();
print "<script>window.location='index.php?view=Categorias';</script>";


}


?>
