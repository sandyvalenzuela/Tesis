<?php 
?>

<div class="row">
	<div class="col-md-12">
	<h1>Nueva Presentacion</h1>
	<br>
		<form class="form-horizontal" method="post" id="addPresentacion" action="index.php?view=addPresentacion" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombrePresentacion" required class="form-control" id="nombrePresentacion" placeholder="Nombre">
    </div>
  </div>
  
  

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Presentacion</button>
    </div>
  </div>
</form>
	</div>
</div>