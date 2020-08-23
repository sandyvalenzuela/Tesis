<?php 

$libro = LibrosData::getById($_GET["id"]);
$autor =  $libro->getAutor();
$autores = AutorData::getAll();


?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Libro</h1>
	<br>
		<form class="form-horizontal" method="post" id="editlibro" action="index.php?view=updatelibro" role="form">

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre"  required value="<?php echo $libro->nombre;?>" class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Autor Registrado</label>
    <div class="col-md-6">
      <input type="text" name="autor" value="<?php echo $autor->nombre." ".$autor->apellido;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Autor*</label>
    <div class="col-md-6">
    <select name="autor_id" required class="form-control">
    <option value="">-- NINGUNO --</option>
    <?php foreach($autores as $autor):?>
      <option value="<?php echo $autor->id;?>"><?php echo $autor->nombre." ".$autor->apellido;?></option>
    <?php endforeach;?>
      </select>    </div>
  </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha Registrada</label>
    <div class="col-md-6">
      <input type="text" name="fecha" value="<?php echo $libro->anio_edicion;?>" class="form-control" id="fecha" placeholder="Fecha Registrada">
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Edicion*</label>
  <div class="col-md-6">
   <input type="date" name="sd"  required value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">
   </div>
  </div>
  
  

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="libro_id" value="<?php echo $libro->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Libro</button>
    </div>
  </div>
</form>
	</div>
</div>