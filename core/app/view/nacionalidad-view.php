<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newautor" class="btn btn-default"><i class='fa fa-book'></i> Nueva Nacionalidad</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/nacionalidad-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
</div>
		<h1>Listado de Nacionalidades</h1>
<br>
		<?php
         
		$nacionalidades = nacionalidadData::getAll();
		if(count($nacionalidades)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nacionalida</th>

			<th></th>
			</thead>
			<?php
			foreach($nacionalidades as $nacionalidad){
			
			?>
				<tr>
				<td><?php echo $nacionalidad->nacionalidad; ?></td>
				<td style="width:150px;">
				<a href="index.php?view=editnacionalidad&id=<?php echo $nacionalidad->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delnacionalidad&id=<?php echo  $nacionalidad->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
              
				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay nacionalidades en el sistema</p>";
		}


		?>


	</div>
</div>