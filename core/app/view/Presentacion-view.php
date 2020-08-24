<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newPresentacion" class="btn btn-default"><i class='fa fa-book'></i> Nueva Presentacion</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/autor-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
</div>
		<h1>Listado de Presentacion</h1>
<br>
		<?php
         
		$Presentaciones = PresentacionData::getAll();
		if(count($Presentaciones)>0){
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th></th>
			</thead>
			<?php
			foreach($Presentaciones as $Presentacion){
			?>
				<tr>
				<td><?php echo $Categoria->nombreCategoria; ?></td>
				<td style="width:150px;">
				<a href="index.php?view=editPresentacion&IdPresentacion=<?php echo $Presentacion->IdPresentacion;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delPresentacion&IdPresentacion=<?php echo $Presentacion->IdPresentacion;?>" class="btn btn-danger btn-xs">Eliminar</a>
                <a href="index.php?view=viewPresentacion&IdPresentacion=<?php echo $Presentacion->IdPresentacion; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>

				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay Categorias en el sistema</p>";
		}


		?>


	</div>
</div>