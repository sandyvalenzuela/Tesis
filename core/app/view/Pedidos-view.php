<div class="row">
	<div class="col-md-12">
		<h1><i class='glyphicon glyphicon-shopping-cart'></i> Lista de Pedidos</h1>
		<div class="clearfix"></div>


<?php

$Productos = PedidoData::getPedidos();
if(count($Productos)>0){

	?>
<br>
<table class="table table-bordered table-hover	">
	<thead>
		<th></th>
		<th>Producto</th>
		<th>Fecha</th>
		<th></th>
	</thead>

	<?php foreach($Productos as $Pedido):?>

	<tr>
		<td style="width:30px;">
		<a href="index.php?view=onePedido&id=<?php echo $Pedido->id; ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-eye-open"></i>  Mostrar</a></td>

		<td>

<!--<?php
$Operaciones = OperacionData::getAllProductosByPedidoId($Pedido->id);
echo count($Operaciones);
?>-->
		
<?php
//$total= $sell->total-$sell->discount;
	//foreach($operations as $operation){
		//$product  = $operation->getProduct();
		//$total += $operation->q*$product->price_out;
	//}
		//echo "<b>$ ".number_format($total)."</b>";

?>		
	
		<td><?php echo $Pedido->created_at; ?></td>
		<td style="width:30px;"><a href="index.php?view=delPedido&id=<?php echo $Pedido->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>  Eliminar</a></td>
	</tr>

<?php endforeach; ?>

</table>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay Pedidos</h2>
		<p>No se ha realizado ningun Pedido.</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>