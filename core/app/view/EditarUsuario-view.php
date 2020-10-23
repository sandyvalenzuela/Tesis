<?php $Usuario = UsuarioData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Usuario</h1>
	<br>
		<form class="form-horizontal" method="post" id="addProducto" action="index.php?view=ActualizarUsuario" role="form">


    <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Imagen*</label>
    <div class="col-md-8">
      <input type="file" name="image" id="nombre" placeholder="">
      <?php if($Usuario->image!=""):?>
  <br>
        <img src="Imagenes/Usuarios/<?php echo $Usuario->image;?>" class="img-responsive">

<?php endif;?>
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" value="<?php echo $Usuario->nombre;?>" class="form-control" id="nombre" placeholder="Nombre"
      pattern="[A-Za-z]{1,25}" title="Debe de incluir letras en Mayuscula y en Minusculas " maxlength="25">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="apellido" value="<?php echo $Usuario->apellido;?>" required class="form-control" id="apellido" placeholder="Apellido"
    pattern="[A-Za-z]{1,25}" title="Debe de incluir letras en Mayuscula y en Minusculas" maxlength="25">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
    <div class="col-md-6">
      <input type="text" name="username" value="<?php echo $Usuario->username;?>" class="form-control" required id="username" placeholder="Nombre de usuario"
      pattern="[-A-Za-z0-9]{1,8}" title="Debe agreagar letras Mayusculas, Minusculas y Numeros" maxlength="8"> 
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $Usuario->email;?>" class="form-control" id="email" placeholder="Email"
      pattern="^[_A-Za-z0-9-\+]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,})" title="Ingresar formato de correo electrónico @gmail.com " maxlength="50">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="inputEmail" placeholder="Contrase&ntilde;a"
      pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Debe agreagar letras Mayusculas, Minusculas, Numeros y Caracteres Especiales">
<p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
    
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" <?php if($Usuario->is_active){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Es administrador</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_admin" <?php if($Usuario->is_admin){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="Usuario_id" value="<?php echo $Usuario->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </div>
  </div>
</form>
	</div>
</div>