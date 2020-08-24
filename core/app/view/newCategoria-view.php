<?php 
?>

<div class="row">
	<div class="col-md-12">
	<h1>Nueva Categoria</h1>
	<br>
		<form class="form-horizontal" method="post" id="addCategoria" action="index.php?view=addCategoria" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombreCategoria" required class="form-control" id="nombreCategoria" placeholder="Nombre">
    </div>
  </div>
  
  

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Categoria</button>
    </div>
  </div>
</form>
	</div>
</div>