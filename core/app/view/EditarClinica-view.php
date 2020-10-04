<?php $Usuario = ClinicaData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Clinica</h1>
	<br>
		<form class="form-horizontal" method="post" id="addProducto" action="index.php?view=updateClinica" role="form">

    <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Codigo de Servicio*</label>
    <div class="col-md-6">
      <input type="text" name="codigo" value="<?php echo $Usuario->codigo;?>" class="form-control" id="codigo" placeholder="Codigo">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" value="<?php echo $Usuario->nombre;?>" class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="Usuario_id" value="<?php echo $Usuario->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Codigo</button>
    </div>
  </div>
</form>
	</div>
</div>