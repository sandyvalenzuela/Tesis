
<?php if(isset($_GET["Producto"]) && $_GET["Producto"]!=""):?>
	<?php
$Productos = ProductoData::getLike($_GET["Producto"]);
if(count($Productos)>0){
	?>
<h3>Resultados de la Busqueda</h3>
<table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Nombre</th>

	</thead>
	<?php
//$Productos_in_cero=0;
	 foreach($Productos as $Producto):
//$q= OperacionData::getQYesF($Producto->id);
	?>
	
		<td style="width:80px;">	<?php echo $Producto->codigo; ?></td>
		<td><?php echo $Producto->nombre; ?></td>
	
		<td style="width:250px;"><form method="post" action="index.php?view=Añadiralcarrito">
		<input type="hidden" name="Producto_id" value="<?php echo $Producto->id; ?>">

<div class="input-group">
<input type="" class="form-control" required name="q" placeholder="Cantidad ...">
      <span class="input-group-btn">
		<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Agregar</button>
      </span>
    </div>


		</form></td>
	</tr>

<!--<?php //else:$products_in_cero++;
?>-->
<!--<?php  //endif; ?>-->
	<?php endforeach;?>
</table>
<!--<?php //if($products_in_cero>0){ echo "<p class='alert alert-warning'>Se omitieron <b>$products_in_cero productos</b> que no tienen existencias en el inventario. <a href='index.php?module=inventary'>Ir al Inventario</a></p>"; }?>-->

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