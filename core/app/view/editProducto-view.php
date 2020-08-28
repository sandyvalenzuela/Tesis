<?php 

$Producto = ProductoData::getById($_GET["IdProducto"]);
$Categoria =  $Producto->getCategoria();
$Categorias = CategoriaData::getAll();


?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Producto</h1>
	<br>
		<form class="form-horizontal" method="post" id="editProducto" action="index.php?view=updateProducto" role="form">

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="NombreProducto"  required value="<?php echo $Producto->nombreProducto;?>" class="form-control" id="NombreProducto" placeholder="Nombre">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-md-6">
      <input type="text" name="Categoria" value="<?php echo $Categoria->nombreCategoria;?>" class="form-control" id="nombreCategoria" placeholder="Nombre">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria*</label>
    <div class="col-md-6">
    <select name="IdCategoria" required class="form-control">
    <option value="">-- NINGUNO --</option>
    <?php foreach($Categorias as $Categoria):?>
      <option value="<?php echo $Categoria->id;?>"><?php echo $Categoria->nombreCategoria;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Presentacion</label>
    <div class="col-md-6">
      <input type="text" name="Presentacion" value="<?php echo $Presentacion->nombrePresentacion;?>" class="form-control" id="nombrePresentacion" placeholder="Nombre">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria*</label>
    <div class="col-md-6">
    <select name="IdCategoria" required class="form-control">
    <option value="">-- NINGUNO --</option>
    <?php foreach($Categorias as $Categoria):?>
      <option value="<?php echo $Categoria->id;?>"><?php echo $Categoria->nombreCategoria;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Edicion*</label>
  <div class="col-md-6">
   <input type="date" name="sd"  required value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">
   </div>
  </div>
  
  

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="libro_id" value="<?php echo $libro->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Libro</button>
    </div>
  </div>
</form>
	</div>
</div>