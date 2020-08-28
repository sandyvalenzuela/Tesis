<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newCategoria" class="btn btn-default"><i class='fa fa-book'></i> Nuevo Categoria</a>
<div class="btn-group pull-right">
    <ul class="dropdown-menu" role="menu">
 
</div>
</div>
		<h1>Listado de Categoria</h1>
<br>
		<?php
         
		$Categorias = CategoriaData::getAll();
		if(count($Categorias)>0){
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th></th>
			</thead>
			<?php
			foreach($Categorias as $Categoria){
			?>
				<tr>
				<td><?php echo $Categoria->nombreCategoria; ?></td>
				<td style="width:150px;">
				<a href="index.php?view=editCategoria&IdCategoria=<?php echo $Categoria->IdCategoria;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delCategoria&IdCategoria=<?php echo $Categoria->IdCategoria;?>" class="btn btn-danger btn-xs">Eliminar</a>
                <a href="index.php?view=viewCategoria&IdCategoria=<?php echo $Categoria->IdCategoria; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>

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