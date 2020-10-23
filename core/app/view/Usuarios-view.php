<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=NuevoUsuario"  class="btn btn-success"><i class="fa fa-address-book-o" aria-hidden="true"></i> Nuevo Usuario</a>
	</div>
</div>
		<h1>Lista de Usuarios</h1>
<br>
		
		<?php

		$Usuarios = UsuarioData::getAll();
		if(count($Usuarios)>0){
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Imagen</th>
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
				<td>
			<?php if($Usuario->image!=""):?>
				<img src="Imagenes/Usuarios/<?php echo $Usuario->image;?>" style="width:64px;">
			<?php endif;?>
		</td>
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
				<td style="width:270px;">
				<a href="index.php?view=EditarUsuario&id=<?php echo $Usuario->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i>	Editar</a>
				<a href="index.php?view=delUsuario&id=<?php echo $Usuario->id;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>	Eliminar</a>
				</td>
				</tr>
				<?php

			}
 echo "</table>";


		}else{
			
		}


		?>


	</div>
</div>