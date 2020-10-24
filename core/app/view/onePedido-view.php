
<h1>Resumen de Pedidos</h1>
<?php if(isset($_GET["id"]) && $_GET["id"]!=""):?>
<?php
$Pedido = PedidoData::getById($_GET["id"]);
$Operaciones = OperacionData::getAllProductosByPedidoId($_GET["id"]);
$total = 0;
?>
<?php
if(isset($_COOKIE["vendido"])){
	foreach ($Operaciones as $Operacion) {
		$qx = OperacionData::getQYesF($Operacion->Producto_id);
			$p = $Operacion->getProducto();
		
	}
	setcookie("vendido","",time()-18600);
}

?>
<table class="table table-bordered">
<?php if($Pedido->Persona_id!=""):
$Cliente = $Pedido->getPersona();
?>
<tr>
	<td style="width:150px;">Cliente</td>
	<td><?php echo $Cliente->nombre." ".$Cliente->apellido;?></td>
</tr>

<?php endif; ?>
<?php if($Pedido->Usuario_id!=""):
$Usuario = $Pedido->getUsuario();
?>
<tr>
	<td>Atendido por</td>
	<td><?php echo $Usuario->nombre." ".$Usuario->apellido;?></td>
</tr>
<?php endif; ?>
</table>
<br><table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Cantidad</th>
		<th>Nombre del Producto</th>
	</thead>
<?php
	foreach($Operaciones as $Operacion){
		$Producto  = $Operacion->getProducto();
?>
<tr>
	<td><?php echo $Producto->id ;?></td>
	<td><?php echo $Operacion->q ;?></td>
	<td><?php echo $Producto->nombre ;?></td>
</tr>
<?php
	}
	?>
