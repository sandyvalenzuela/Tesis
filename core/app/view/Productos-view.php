<div class="row">
	<div class="col-md-12">
<div class="btn-group  pull-right">
	<a href="index.php?view=NuevoProducto" class="btn btn-success"><i class="fa fa-address-book-o"></i> Agregar Producto</a>

</div>
</div>
		<h1>Lista de Productos</h1>


		<div class="clearfix"></div>

		<?php
$page = 1;
if(isset($_GET["page"])){
	$page=$_GET["page"];
}
$limit=10;
if(isset($_GET["limit"]) && $_GET["limit"]!="" && $_GET["limit"]!=$limit){
	$limit=$_GET["limit"];
}

$Productos = ProductoData::getAll();
if(count($Productos)>0){

if($page==1){
$curr_productos = ProductoData::getAllByPage($Productos[0]->id,$limit);
}else{
$curr_productos = ProductData::getAllByPage($Products[($page-1)*$limit]->id,$limit);

}
$npaginas = floor(count($Productos)/$limit);
 $spaginas = count($Productos)%$limit;

if($spaginas>0){ $npaginas++;}

	?>

	<h3>Pagina <?php echo $page." de ".$npaginas; ?></h3>
<div class="btn-group pull-right">
<?php
$px=$page-1;
if($px>0):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=productos&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
<?php endif; ?>

<?php 
$px=$page+1;
if($px<=$npaginas):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=productos&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
<?php endif; ?>
</div>
		<div class="clearfix"></div>	
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Imagen</th>
		<th>codigo</th>
		<th>Nombre</th>
		<th>Categoria</th>
		<th>Activo</th>
		<th></th>
	</thead>
	<?php foreach($curr_productos as $Producto):?>
	
	<tr>
		<td>
			<?php if($Producto->image!=""):?>
				<img src="Imagenes/Productos/<?php echo $Producto->image;?>" style="width:64px;">
			<?php endif;?>
		</td>
		<td><?php echo $Producto->codigo; ?></td>
		<td><?php echo $Producto->nombre; ?></td>
		<td><?php if($Producto->categoria_id!=null){echo $Producto->getCategoria()->nombre;}else { echo "<center>----</center>"; }  ?></td>
		<td><?php if($Producto->is_active): ?><i class="fa fa-check"></i><?php endif;?></td>
		

		<td style="width:270px;">
		<a href="index.php?view=EditarProducto&id=<?php echo $Producto->id; ?>" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-pencil"></i>  Editar   </i></a>
		<a href="index.php?view=delProducto&id=<?php echo $Producto->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar    </a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<div class="btn-group pull-right">
<?php

}
else{
	?>
	<div class="jumbotron">
		<h2>No hay productos</h2>
		<p>No se han agregado productos a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Producto"</b>.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>