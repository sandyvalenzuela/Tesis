<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Cliente</h1>
	<br>
		<form class="form-horizontal" method="post" id="addProducto" action="index.php?view=addcliente" role="form">


  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="apellido" required class="form-control" id="apellido" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="direccion" class="form-control" required id="direccion" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Telefono*</label>
    <div class="col-md-6">
      <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono">
    </div>
  </div>



  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Cliente</button>
    </div>
  </div>
</form>
	</div>
</div>