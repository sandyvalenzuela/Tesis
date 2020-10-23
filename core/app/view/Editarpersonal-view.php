<?php $Usuario = PersonaData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Personal</h1>
	<br>
		<form class="form-horizontal" method="post" id="addProducto" action="index.php?view=Actualizarpersonal" role="form">

    <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">IBM*</label>
    <div class="col-md-6">
      <input type="text" name="IBM" value="<?php echo $Usuario->IBM;?>" class="form-control" id="IBM" placeholder="IBM">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" value="<?php echo $Usuario->nombre;?>" class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="apellido" value="<?php echo $Usuario->apellido;?>" required class="form-control" id="apellido" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Direccion*</label>
    <div class="col-md-6">
      <input type="text" name="direccion" value="<?php echo $Usuario->direccion;?>" class="form-control" required id="username" placeholder="Direccion">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $Usuario->email;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Telefono</label>
    <div class="col-md-6">
      <input type="text" name="telefono"  value="<?php echo $Usuario->telefono;?>"  class="form-control" id="inputEmail" placeholder="Telefono">
    </div>
  </div>


  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="Usuario_id" value="<?php echo $Usuario->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Personal</button>
    </div>
  </div>
</form>
	</div>
</div>