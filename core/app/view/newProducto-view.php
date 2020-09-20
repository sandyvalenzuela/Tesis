    <?php 
$Categorias = CategoriaData::getAll();
    ?>
<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Producto</h1>
	<br>
		<form class="form-horizontal" method="post" enctype="multipart/form-data" id="addProducto" action="index.php?view=addProducto" role="form">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Imagen</label>
    <div class="col-md-6">
      <input type="file" name="image" id="image" placeholder="">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombre del Producto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
    <div class="col-md-6">
    <select name="Categoria_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($Categorias as $Categoria):?>
      <option value="<?php echo $Categoria->id;?>"><?php echo $Categoria->nombre;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-md-6">
      <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion del Producto"></textarea>
    </div>
  </div>
  

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Presentacion</label>
    <div class="col-md-6">
      <input type="text" name="presentacion" class="form-control" id="inputEmail1" placeholder="Presentacion del Producto">
    </div>
  </div>
  <div class="form-group">


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </div>
  </div>
</form>

	</div>
</div>

