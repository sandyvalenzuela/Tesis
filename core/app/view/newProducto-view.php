<?php 
$Categorias = CategoriaData::getAll();
$Presentaciones = PresentacionData::getAll();
?>

<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Producto</h1>
	<br>
		<form class="form-horizontal" method="post" id="addProducto" action="index.php?view=addProducto" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" required class="form-control" id="NombreProducto" placeholder="Nombre">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria*</label>
    <div class="col-md-6">
    <select name="IdCategoria" required class="form-control">
    <option value="">-- NINGUNO --</option>
    <?php foreach($Categorias as $Categoria):?>
      <option value="<?php echo $Categoria->IdCategoria;?>"><?php echo $Categoria->nombreCategoria;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>  


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Presentacion*</label>
    <div class="col-md-6">
    <select name="IdPresentacion" required class="form-control">
    <option value="">-- NINGUNO --</option>
    <?php foreach($Presentaciones as $Presentacion):?>
      <option value="<?php echo $Presentacion->IdPresentacion;?>"><?php echo $Presentacion->nombrePresentacion;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>  




  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cantidad*</label>
    <div class="col-md-6">
      <input type="text" name="Cantidad" required class="form-control" id="Cantidad" placeholder="Cantidad">
    </div>
  </div>


  

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </div>
  </div>
</form>
	</div>
</div>