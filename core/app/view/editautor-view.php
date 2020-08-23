<?php 

$autor = AutorData::getById($_GET["id"]);
$nacionalidad =  $autor->getNacionalidad();
$nacionalidades = nacionalidadData::getAll();


?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Autor</h1>
	<br>
		<form class="form-horizontal" method="post" id="editautor" action="index.php?view=updateautor" role="form">

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre"  required value="<?php echo $autor->nombre;?>" class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="apellido" value="<?php echo $autor->apellido;?>" class="form-control" id="apellido" placeholder="Apellido">
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

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha Registro</label>
    <div class="col-md-6">
      <input type="text" name="fecha" value="<?php echo $autor->fecha;?>" class="form-control" id="fecha" placeholder="Fecha Registro">
    </div>
  </div>
  
  

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="autor_id" value="<?php echo $autor->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Autor</button>
    </div>
  </div>
</form>
	</div>
</div>