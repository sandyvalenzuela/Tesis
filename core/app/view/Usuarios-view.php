<div class="row">
	<div class="col-md-12">
	<a href="index.php?view=newUsuario" class="btn btn-default pull-right"><i class='glyphicon glyphicon-Usearios'></i> Nuevo Usuario</a>
		<h1>Lista de Usuarios</h1>
<br>
		
		<?php

		$Usuarios = UsuarioData::getAll();
		if(count($Usuarios)>0){
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Nombre de usuario</th>
			<th>Email</th>
			<th>Activo</th>
			<th>Admin</th>
			<th></th>
			</thead>
			<?php
			foreach($Usuarios as $Usuario){
				?>
				<tr>
				<td><?php echo $Usuario->nombre." ".$Usuario->apellido; ?></td>
				<td><?php echo $Usuario->username; ?></td>
				<td><?php echo $Usuario->email; ?></td>
				<td>
					<?php if($Usuario->is_active):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if($Usuario->is_admin):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td style="width:30px;"><a href="index.php?view=editUsuario&id=<?php echo $Usuario->id;?>" class="btn btn-warning btn-xs">Editar</a></td>
				</tr>
				<?php

			}
 echo "</table>";


		}else{
			// no hay usuarios
		}


		?>


	</div>
</div>