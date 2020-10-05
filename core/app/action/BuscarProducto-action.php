
<?php if(isset($_GET["Producto"]) && $_GET["Producto"]!=""):?>
	<?php
$Productos = ProductoData::getLike($_GET["Producto"]);
if(count($productos)>0){
	?>
<h3>Resultados de la Busqueda</h3>
<table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Nombre</th>
		<th>Cantidad</th>
	</thead>
	<?php
$Productos_in_cero=0;
	 foreach($Productos as $Producto):
$q= OperacionData::getQYesF($Producto->id);
	?>
	
		<td style="width:80px;"><?php echo $Producto->id; ?></td>
		<td><?php echo $Producto->codigo; ?></td>
		<td><?php echo $Producto->nombre; ?></td>
		<td>
		</td>
		<td style="width:250px;"><form method="post" action="index.php?view=Añadiralcarrito">
		<input type="hidden" name="Producto_id" value="<?php echo $Producto->id; ?>">

<div class="input-group">
      <span class="input-group-btn">
		<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Agregar</button>
      </span>
    </div>


		</form></td>
	</tr>

</table>

	<?php
}
  else{
	echo "<br><p class='alert alert-danger'>No se encontro el producto</p>";
}
?>
<hr><br>
<?php else:
?>
<?php endif; ?>