<?php
$Categorias = CategoriaData::getById($_GET["IdCategoria"]);

?>
<div class="row">
	<div class="col-md-8">
	<h1><?php echo $Categoria->nombre ?> <small>Consultar Categoria</small></h1>
	<br><br>
		<form class="form-horizontal" method="post" id="vistaCategoria" enctype="multipart/form-data" action="index.php?view=vista" role="form">


   <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nombre</label>
    <div class="col-md-6">
	<fieldset disabled>
      <input type="text" name="nombreCategoria" class="form-control" id="nombreCategoria" value="<?php echo $Categoria->nombre; ?>" placeholder="Nombre">
    </div>
  </div> 
  
 
  

  
 
</form>

<br><br><br><br><br><br><br><br><br>
	</div>

<?php endif; ?>