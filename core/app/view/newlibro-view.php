<?php 
$autores = AutorData::getAll();
?>

<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Libro</h1>
	<br>
		<form class="form-horizontal" method="post" id="addlibro" action="index.php?view=addlibro" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombre">
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
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Edicion*</label>
  <div class="col-md-6">
   <input type="date" name="sd"  required value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">
   </div>
  </div>


  

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Libro</button>
    </div>
  </div>
</form>
	</div>
</div>