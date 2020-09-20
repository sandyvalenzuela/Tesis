<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newCategoria" class="btn btn-default"><i class='fa fa-th-list'></i> Nueva Categoria</a>
</div>
		<h1>Categorias</h1>
<br>
		<?php

		$Usuarios = CategoriaData::getAll();
		if(count($Usuarios)>0){
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			</thead>
			<?php
			foreach($Usuarios as $Usuario){
				?>
				<tr>
				<td><?php echo $Usuario->nombre." ".$Usuario->apellido; ?></td>
				<td style="width:130px;"><a href="index.php?view=editCategoria&id=<?php echo $Usuario->id;?>" class="btn btn-warning btn-xs">Editar</a> <a href="index.php?view=delCategoria&id=<?php echo $Usuario->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}



		}else{
			echo "<p class='alert alert-danger'>No hay Categorias</p>";
		}


		?>


	</div>
</div>