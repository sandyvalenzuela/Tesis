<?php

if(count($_POST)>0){
	$Categoria = new CategoriaData();
	$Categoria->nombreCategoria = $_POST["nombreCategoria"];
	$Categoria->add();
	
print "<script>window.location='index.php?view=Categoria';</script>";


}


?>