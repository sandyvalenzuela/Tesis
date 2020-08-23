<?php 
//$autores = AutorData::getAll();
?>

<div class="row">
	<div class="col-md-12">
	<h1>Nueva Nacionalidad</h1>
	<br>
		<form class="form-horizontal" method="post" id="addnacionalidad" action="index.php?view=addnacionalidad" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nacionalidad*</label>
    <div class="col-md-6">
      <input type="text" name="nacionalidad" required class="form-control" id="nacionalidad" placeholder="Nacionalidad">
    </div>
  </div>
  
  

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Nacionalidad</button>
    </div>
  </div>
</form>
	</div>
</div>