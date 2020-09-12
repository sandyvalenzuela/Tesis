<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newcliente" class="btn btn-default"><i class='fa fa-smile-o'></i> Nuevo Cliente</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/clientes-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
</div>
		<h1>Personal </h1>
<br>
		<?php

		$usuarios = PersonaData::getClientes();
		if(count($usuarios)>0){
		
			?>

			<table class="table table-bordered table-hover">
			<thead>
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
				<td><?php echo $Usuario->nombre." ".$Usuarios->apellido; ?></td>
				<td><?php echo $Usuario->direccion; ?></td>
				<td><?php echo $Usuario->email; ?></td>
				<td><?php echo $Usuario->telefono; ?></td>
				<td style="width:130px;">
				<a href="index.php?view=editcliente&id=<?php echo $Usuario->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delcliente&id=<?php echo $Usuario->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay clientes</p>";
		}


		?>


	</div>
</div>