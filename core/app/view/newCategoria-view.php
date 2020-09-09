<div class="row">
	<div class="col-md-12">
	<h1>Nueva Categoria</h1>
	<br>
		<form class="form-horizontal" method="post" id="addCategoria" action="index.php?view=addCategoria" role="form">
  
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Imagen</label>
    <div class="col-md-6">
      <input type="file" name="image" id="image" placeholder="">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-md-6">
      <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion de la Categoria"></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Categoria</button>
    </div>
  </div>
</form>
	</div>
</div>