<?php
$autor = AutorData::getById($_GET["id"]);
$nacionalidad =  $autor->getNacionalidad();
if($libros!=null):
?>
<div class="row">
	<div class="col-md-8">
	<h1><?php echo $autor->nombre." ".$autor->apellido ?> <small>Consultar Autor</small></h1>
	<br><br>
		<form class="form-horizontal" method="post" id="vistaautor" enctype="multipart/form-data" action="index.php?view=vista" role="form">


   <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nombre</label>
    <div class="col-md-6">
	<fieldset disabled>
      <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $autor->nombre; ?>" placeholder="Nombre">
    </div>
  </div> 
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Apellido</label>
    <div class="col-md-6">
	<fieldset disabled>
      <input type="text" name="apellido" class="form-control" id="apellido" value="<?php echo $autor->apellido; ?>" placeholder="Apellido">
    </div>
  </div> 
  
    <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nacionalidad</label>
    <div class="col-md-6">
	<fieldset disabled>
      <input type="text" name="nacionalidad" class="form-control" id="nacionalidad" value="<?php echo $nacionalidad->nacionalidad; ?>" placeholder="nacionalidad">
    </div>
  </div> 
  
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Fecha de registro</label>
    <div class="col-md-6">
	<fieldset disabled>
      <input type="text" name="fecha" class="form-control" id="fecha" value="<?php echo $autor->fecha; ?>" placeholder="Fecha de registro">
    </div>
  </div> 
  
 
</form>

<br><br><br><br><br><br><br><br><br>
	</div>
</div>
<?php endif; ?>