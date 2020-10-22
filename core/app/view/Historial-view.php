<?php
if(isset($_GET["Producto_id"])):
$Producto = ProductoData::getById($_GET["Producto_id"]);
$Operaciones = OperacionData::getAllByProductoId($Producto->id);
?>
<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="Reportes/Historial-word.php?id=<?php echo $Producto->id;?>">Word 2007 (.docx)</a></li>
  </ul>
</div>
<h1><?php echo $Producto->nombre;; ?> <small>Historial</small></h1>
	</div>
	</div>

<div class="row">


	<div class="col-md-4">

</div>
<div class="row">
	<div class="col-md-12">
		<?php if(count($Operaciones)>0):?>
			<table class="table table-bordered table-hover">
			<thead>
			<th></th>

			<th>Fecha</th>
			<th></th>
			</thead>
			<?php foreach($curr_productos as $Producto):?>
			<tr>
			<td></td>
			<td><?php if($Producto->create_at): ?><i class="fa fa-check"></i><?php endif;?></td>
			
			<td style="width:40px;"><script>
			
		//	$("#oper-"+<?php echo $operacion->id; ?>).click(function(){
			//	x = confirm("Estas seguro que quieres eliminar esto ??");
			//	if(x==true){
					window.location = "index.php?view=EliminarOperacion&ref=history&pid=<?php echo $operacion->Producto_id;?>&opid=<?php echo $operacion->id;?>";
				}
			});

			</script>
			</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
	</div>
</div>

<?php endif; ?>