
<h1>Resumen de Pedido</h1>
<?php if(isset($_GET["id"]) && $_GET["id"]!=""):?>
<?php
$Pedido = PedidoData::getById($_GET["id"]);
$Operaciones = OperacionData::getAllProductosByPedidoId($_GET["id"]);
$total = 0;
?>
<?php
if(isset($_COOKIE["selled"])){
	foreach ($Operaciones as $Operacion) {
//		print_r($operation);
		$qx = OperacionData::getQYesF($Operacion->Producto_id);
		// print "qx=$qx";
			$p = $Operacion->getProducto();
		/*if($qx==0){
			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> no tiene existencias en inventario.</p>";			
		}else if($qx<=$p->inventary_min/2){

			echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene muy pocas existencias en inventario.</p>";
		}else if($qx<=$p->inventary_min){
			echo "<p class='alert alert-warning'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene pocas existencias en inventario.</p>";
		}*/
	}
	setcookie("selled","",time()-18600);
}
?>
<table class="table table-bordered">
<?php if($Pedido->Clinica_id!=""):
$Clinica = $Pedido->getClinica();
?>
<tr>
	<td style="width:150px;">Clinica</td>
	<td><?php echo $Clinica->nombre;?></td>
</tr>

<?php endif; ?>


<?php if($Pedido->Usuario_id!=""):
$Usuario = $Pedido->getUsuario();
?>
<tr>
	<td>Usuario</td>
	<td><?php echo $Usuario->nombre." ".$Usuario->apellido;?></td>
</tr>
<?php endif; ?>
</table>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Nombre del Producto</th>
		<th>Cantidad</th>
		
	</thead>
<?php
	foreach($Operaciones as $Operacion){
		$Producto  = $Operacion->getProducto();
?>
<tr>
	<td><?php echo $Producto->codigo ;?></td>
	<td><?php echo $Producto->nombre ;?></td>
	<td><?php echo $Operacion->q ;?></td>
	
	<!--<td>$ <?php //echo number_format($product->price_out,2,".",",") ;?></td>-->
	<!--<td><b>$ <?php //echo number_format($operation->q*$product->price_out,2,".",",");$total+=$operation->q*$product->price_out;?></b></td>-->
</tr>
<?php
	}
	?>
</table>
<br><br>
<div class="row">
<div class="col-md-4">
<!--<table class="table table-bordered">
	<tr>
		<td><h4>Clinica:</h4></td>
		<td><h4> <?php //echo number_format($sell->person_id); ?></h4></td>
	</tr>
	<tr>
		<td><h4>Subtotal:</h4></td>
		<td><h4>$ <?php //echo number_format($total,2,'.',','); ?></h4></td>
	</tr>
	<tr>
		<td><h4>Total:</h4></td>
		<td><h4>$ <?php //echo number_format($total-	$sell->discount,2,'.',','); ?></h4></td>
	</tr>
</table>-->
</div>
</div>
<?php else:?>
	501 Internal Error
<?php endif; ?>