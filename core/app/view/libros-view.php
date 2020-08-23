<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newlibro" class="btn btn-default"><i class='fa fa-book'></i> Nuevo Vendedor</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/providers-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
</div>
		<h1>Listado de Libros</h1>
<br>
		<?php
         
		$libros = LibrosData::getAll();
		if(count($libros)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Autor</th>
			<th>Fecha Edicion</th>
			<th></th>
			</thead>
			<?php
			foreach($libros as $libro){
			$autor =  $libro->getAutor();
			?>
				<tr>
				<td><?php echo $libro->nombre; ?></td>
				<td><?php echo $autor->nombre." ".$autor->apellido; ?></td>
				<td><?php echo $libro->anio_edicion; ?></td>
				<td style="width:150px;">
				<a href="index.php?view=editlibro&id=<?php echo $libro->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=dellibro&id=<?php echo $libro->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
                <a href="index.php?view=viewlibro&id=<?php echo $libro->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>

				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay libros en el sistema</p>";
		}


		?>


	</div>
</div>