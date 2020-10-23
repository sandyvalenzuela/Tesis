<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=Nuevopersonal" class="btn btn-success"><i class='fa fa-smile-o'></i> Nuevo Personal</a>
</div>
</div>
		<h1>Personal </h1>
<br>
		<?php

		$Usuarios = PersonaData::getPersonals();
		if(count($Usuarios)>0){
		
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>IBM</th>
			<th>Nombre completo</th>
			<th>Direccion</th>
			<th>Email</th>
			<th>Telefono</th>
			<th></th>
			</thead>
			<?php
			foreach($Usuarios as $Usuario){
				?>
				<tr>
				<td><?php echo $Usuario->IBM; ?></td>
				<td><?php echo $Usuario->nombre." ".$Usuario->apellido; ?></td>
				<td><?php echo $Usuario->direccion; ?></td>
				<td><?php echo $Usuario->email; ?></td>
				<td><?php echo $Usuario->telefono; ?></td>
				<td style="width:270px;">
				<a href="index.php?view=Editarpersonal&id=<?php echo $Usuario->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> 	Editar</a>
				<a href="index.php?view=delPersonal&id=<?php echo $Usuario->id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>	Eliminar</a>
				</td>
				</tr>
				<?php

			}
			echo "</table>";



		}else{
			echo "<p class='alert alert-danger'>No hay Personal Ingresado</p>";
		}


		?>


	</div>
</div>