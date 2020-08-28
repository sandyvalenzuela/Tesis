<?php
$Productos = ProductoData::getById($_GET["IdProducto"]);
$Categoria =  $Productos->getCategoria();
if($Productos!=null):
?>
<div class="row">
	<div class="col-md-8">
	<h1><?php echo $Productos->nombre ?> <small>Consultar Producto</small></h1>
	<br><br>
		<form class="form-horizontal" method="post" id="vistaProducto" enctype="multipart/form-data" action="index.php?view=vista" role="form">


   <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Producto</label>
    <div class="col-md-8">
	<fieldset disabled>
      <input type="text" name="NombreProducto" class="form-control" id="NombreProducto" value="<?php echo $Productos->nombre; ?>" placeholder="Producto">
    </div>
  </div> 
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-md-6">
      <input type="text" name="Categoria" value="<?php echo $Categoria->nombreCategoria;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Presentacion</label>
    <div class="col-md-6">
      <input type="text" name="Presentacion" value="<?php echo $Presentacion->PrsentacionCategoria;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Cantidad</label>
    <div class="col-md-8">
	<fieldset disabled>
      <input type="text" name="Cantidad" class="form-control" id="Cantidad" value="<?php echo $Productos->Cantidad; ?>" placeholder="Producto">
    </div>
  </div> 
  
 
</form>

<br><br><br><br><br><br><br><br><br>
	</div>
</div>
<?php endif; ?>