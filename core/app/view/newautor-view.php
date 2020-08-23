<?php 
//$autores = AutorData::getAll();
$nacionalidades = nacionalidadData::getAll();
?>

<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Autor</h1>
	<br>
		<form class="form-horizontal" method="post" id="addautor" action="index.php?view=addautor" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="apellido" required class="form-control" id="apellido" placeholder="Apellido">
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nacionalidad*</label>
    <div class="col-md-6">
    <select name="nacionalidad_id" required class="form-control">
    <option value="">-- NINGUNO --</option>
    <?php foreach($nacionalidades as $nac):?>
      <option value="<?php echo $nac->id;?>"><?php echo $nac->nacionalidad;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>
  

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Autor</button>
    </div>
  </div>
</form>
	</div>
</div>