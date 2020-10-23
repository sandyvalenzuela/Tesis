<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=NuevaClinica" class="btn btn-success "><i class="fa fa-address-book-o" aria-hidden="true"></i> Nueva Clinica</a>
</div>
		<h1>Clinicas</h1>
<br>
		<?php

		$Usuarios = ClinicaData::getAll();
		if(count($Usuarios)>0){
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Codigo</th>
			<th>Nombre</th>
			</thead>
			<?php
			foreach($Usuarios as $Usuario){
				?>
				<tr>
				<td><?php echo $Usuario->codigo; ?></td>
				<td><?php echo $Usuario->nombre; ?></td>
				<td style="width:270px;"><a href="index.php?view=EditarClinica&id=<?php echo $Usuario->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i>	Editar</a> <a href="index.php?view=delClinica&id=<?php echo $Usuario->id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>	Eliminar</a></td>
				</tr>
			<?php
			
				

			}


			echo "</table>";


		}else{
			echo "<p class='alert alert-danger'>No hay Categorias</p>";
		}

		
		?>


	</div>
</div>