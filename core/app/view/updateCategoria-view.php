<?php

if(count($_POST)>0){
	$Categoria = CategoriaData::getById($_POST["IdCategoria"]);
	$Categoria->nombreCategoria = $_POST["nombreCategoria"];
	$Categoria->update();
	
	


print "<script>window.location='index.php?view=Categoria';</script>";


}


?>