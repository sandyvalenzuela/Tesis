<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newProducto" class="btn btn-default"><i class='fa fa-book'></i> Nuevo Producto</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/providers-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
</div>
		<h1>Listado de Productos</h1>
<br>
		<?php
         
		$Producto = ProductoData::getAll();
		if(count($Producto)>0){
			
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Categoria</th>
			<th>Presentacion</th>
			<th>Cantidad</th>
			<th></th>
			</thead>
			<?php
			foreach($Producto as $Producto){
			$Categoria =  $Producto->getCategoria();
			$Presentacion =  $Producto->getPresentacion();
			?>
				<tr>
				<td><?php echo $Producto->NombreProducto; ?></td>
				<td><?php echo $Categoria->nombre." ".$Categoria; ?></td>
				<td><?php echo $Presentacion->nombre." ".$Presentacion; ?></td>
				<td><?php echo $Producto->Cantidad; ?></td>
				<td style="width:150px;">
				<a href="index.php?view=editProducto&IdProducto=<?php echo $Producto->IdProducto;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delProducto&IdProducto=<?php echo $Producto->IdProducto;?>" class="btn btn-danger btn-xs">Eliminar</a>
                <a href="index.php?view=viewProducto&IdProducto=<?php echo $Producto->IdProducto; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>

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