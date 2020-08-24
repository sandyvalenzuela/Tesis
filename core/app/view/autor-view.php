<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newautor" class="btn btn-default"><i class='fa fa-book'></i> Nuevo Autor</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/autor-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
</div>
		<h1>Listado de Autores</h1>
<br>
		<?php
         
		$autores = AutorData::getAll();
		if(count($autores)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Nacionalida</th>
			<th>Fecha Creacion</th>
			<th></th>
			</thead>
			<?php
			foreach($autores as $autor){
			$nacionalidad =  $autor->getNacionalidad();
			?>
				<tr>
				<td><?php echo $autor->nombre; ?></td>
				<td><?php echo $autor->apellido; ?></td>
				<td><?php echo $nacionalidad->nacionalidad; ?></td>
				<td><?php echo $autor->fecha; ?></td>
				<td style="width:150px;">
				<a href="index.php?view=editautor&id=<?php echo $autor->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delautor&id=<?php echo $autor->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
                <a href="index.php?view=viewautor&id=<?php echo $autor->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>

				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay autores en el sistema</p>";
		}


		?>


	</div>
</div>