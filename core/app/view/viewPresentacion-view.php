<?php
$Presentaciones = PresentacionData::getById($_GET["IdPresentacion"]);
if($Presentaciones!=null):
?>
<div class="row">
	<div class="col-md-8">
	<h1><?php echo $Presentacion->nombre ?> <small>Consultar Presentacion</small></h1>
	<br><br>
		<form class="form-horizontal" method="post" id="vistaPresentacion" enctype="multipart/form-data" action="index.php?view=vista" role="form">


   <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">Nombre</label>
    <div class="col-md-6">
	<fieldset disabled>
      <input type="text" name="nombrePresentacion" class="form-control" id="nombrePresentacion" value="<?php echo $Presentacion->nombre; ?>" placeholder="Nombre">
    </div>
  </div> 
  
 
  

  
 
</form>

<br><br><br><br><br><br><br><br><br>
	</div>
</div>
<?php endif; ?>