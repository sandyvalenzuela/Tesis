<?php 

$nacionalidad = nacionalidadData::getById($_GET["id"]);



?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Nacionalidad</h1>
	<br>
		<form class="form-horizontal" method="post" id="editnacionalidad" action="index.php?view=updatenacionalidad" role="form">

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nacionalidad*</label>
    <div class="col-md-6">
      <input type="text" name="nacionalidad"  required value="<?php echo $nacionalidad->nacionalidad;?>" class="form-control" id="nacionalidad" placeholder="Nacionalidad">
    </div>
  </div>
  
  

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="nacionalidad_id" value="<?php echo $nacionalidad->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Nacionalidad</button>
    </div>
  </div>
</form>
	</div>
</div>