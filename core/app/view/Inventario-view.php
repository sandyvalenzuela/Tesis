<div class="row">
	<div class="col-md-12">
<!-- Single button -->
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/Inventario-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
		<h1><i class="glyphicon glyphicon-stats"></i> Inventario de Productos</h1>
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
$productos = ProductoData::getAll();
if(count($productos)>0){

if($page==1){
$curr_productos = ProductoData::getAllByPage($productos[0]->id,$limit);
}else{
$curr_productos = ProductoData::getAllByPage($productos[($page-1)*$limit]->id,$limit);

}
$npaginas = floor(count($productos)/$limit);
 $spaginas = count($productos)%$limit;

if($spaginas>0){ $npaginas++;}

	?>

	<h3>Pagina <?php echo $page." de ".$npaginas; ?></h3>
<div class="btn-group pull-right">
<?php
$px=$page-1;
if($px>0):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=Inventario&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
<?php endif; ?>

<?php 
$px=$page+1;
if($px<=$npaginas):
?>
<a class="btn btn-sm btn-default" href="<?php echo "index.php?view=Inventario&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
<?php endif; ?>
</div>
<div class="clearfix"></div>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Nombre</th>
		
		<th></th>
		<th></th>
	</thead>
	<?php foreach($curr_productos as $Producto):
	$q=OperacionData::getQYesF($Producto->id);
	?>
		<td><?php echo $Producto->codigo; ?></td>
		<td><?php echo $Producto->nombre; ?></td>
		
		<td style="width:93px;">

		<a href="index.php?view=Historial&Producto_id=<?php echo $Producto->id; ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-time"></i> Historial</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>
<div class="btn-group pull-right">
<?php

for($i=0;$i<$npaginas;$i++){
	echo "<a href='index.php?view=Inventario&limit=$limit&page=".($i+1)."' class='btn btn-default btn-sm'>".($i+1)."</a> ";
}
?>
</div>


<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay productos</h2>
		<p>No se han agregado productos <b>"Agregar Producto"</b>.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>