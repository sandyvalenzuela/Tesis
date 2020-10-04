<?php
$Producto = ProductoData::getById($_GET["id"]);
$Categorias = CategoriaData::getAll();

if($Producto!=null):
?>
<div class="row">
	<div class="col-md-8">
	<h1><?php echo $Producto->nombre ?> <small>Editar Producto</small></h1>
  <?php if(isset($_COOKIE["prdupd"])):?>
    <p class="alert alert-info">La informacion del producto se ha actualizado exitosamente.</p>
  <?php setcookie("prdupd","",time()-18600); endif; ?>
	<br><br>
		<form class="form-horizontal" method="post" id="addProducto" enctype="multipart/form-data" action="index.php?view=updateProducto" role="form">

  <div class="form-group">
    <label for="inputEmail" class="col-lg-3 control-label">Imagen*</label>
    <div class="col-md-8">
      <input type="file" name="image" id="nombre" placeholder="">
      <?php if($Producto->image!=""):?>
  <br>
        <img src="Imagenes/Productos/<?php echo $Producto->image;?>" class="img-responsive">

<?php endif;?>
    </div>
  </div>
  


  <div class="form-group">
    <label for="inputEmail" class="col-lg-3 control-label">Codigo*</label>
    <div class="col-md-8">
      <input type="text" name="codigo" class="form-control" id="codigo" value="<?php echo $Producto->codigo; ?>" placeholder="Codigo del Producto">
    </div>
  
    <div class="form-group">
    <label for="inputEmail" class="col-lg-3 control-label">Nombre*</label>
    <div class="col-md-8">
      <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $Producto->nombre; ?>" placeholder="Nombre del Producto">
    </div>


  </div>
    <div class="form-group">
    <label for="inputEmail" class="col-lg-3 control-label">Categoria</label>
    <div class="col-md-8">
    <select name="Categoria_id" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($Categorias as $Categoria):?>
      <option value="<?php echo $Categoria->id;?>" <?php if($Producto->Categoria_id!=null&& $Producto->Categoria_id==$Categoria->id){ echo "selected";}?>><?php echo $Categoria->nombre;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>


  
  <div class="form-group">
    <label for="inputEmail" class="col-lg-3 control-label">Descripcion</label>
    <div class="col-md-8">
      <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion del Producto"><?php echo $Producto->descripcion;?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail" class="col-lg-3 control-label">Presentacion</label>
    <div class="col-md-8">
      <input type="text" name="presentacion" class="form-control" id="inputEmail" value="<?php echo $Producto->presentacion; ?>" placeholder="Presentacion del Producto">
    </div>
  </div>
 

  <div class="form-group">
    <label for="inputEmail" class="col-lg-3 control-label" >Esta activo</label>
    <div class="col-md-8">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" <?php if($Producto->is_active){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-8">
    <input type="hidden" name="Usuario_id" value="<?php echo $Usuario->id; ?>">
      <button type="submit" class="btn btn-success">Actualizar Producto</button>
    </div>
  </div>
</form>

<br><br><br><br><br><br><br><br><br>
	</div>
</div>
<?php endif; ?>