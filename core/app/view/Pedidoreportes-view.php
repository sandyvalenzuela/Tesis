<?php
$Clientes = PersonaData::getClientes();
?>
<section class="content">
<div class="row">
	<div class="col-md-12">
	<h1>Reportes de Pedidos</h1>

						<form>
						<input type="hidden" name="view" value="Pedidoreportes">
<div class="row">
<div class="col-md-3">

<select name="Cliente_id" class="form-control">
	<option value="">--  TODOS --</option>
	<?php foreach($Clientes as $p):?>
	<option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>
	<?php endforeach; ?>
</select>

</div>
<div class="col-md-3">
<input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">
</div>
<div class="col-md-3">
<input type="date" name="ed" value="<?php if(isset($_GET["ed"])){ echo $_GET["ed"]; }?>" class="form-control">
</div>

<div class="col-md-3">
<input type="submit" class="btn btn-success btn-block" value="Procesar">
</div>

</div>
<!--
<br>
<div class="row">
<div class="col-md-4">

<select name="mesero_id" class="form-control">
	<option value="">--  MESEROS --</option>
	<?php foreach($meseros as $p):?>
	<option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>
	<?php endforeach; ?>
</select>

</div>

<div class="col-md-4">

<select name="operation_type_id" class="form-control">
	<option value="1">VENTA</option>
</select>

</div>

</div>
-->
</form>

	</div>
	</div>
<br><!--- -->
<div class="row">
	
	<div class="col-md-12">
		<?php if(isset($_GET["sd"]) && isset($_GET["ed"]) ):?>
<?php if($_GET["sd"]!=""&&$_GET["ed"]!=""):?>
			<?php 
			$Operaciones = array();

			if($_GET["Cliente_id"]==""){
			$Operaciones = PedidoData::getAllByDateOp($_GET["sd"],$_GET["ed"],2);
			}
			else{
			$Operaciones = PedidoData::getAllByDateBCOp($_GET["Cliente_id"],$_GET["sd"],$_GET["ed"],2);
			} 


			 ?>

			 <?php if(count($Operaciones)>0):?>
	
<table class="table table-bordered">
	<thead>
		<th>Id</th>	
		<th>Fecha</th>
	</thead>
<?php foreach($Operaciones as $Operacion):?>
	<tr>
		<td><?php echo $Operacion->id; ?></td>
		<td><?php echo $Operacion->created_at; ?></td>
	</tr>
</table>
			 <?php else:
			 // si no hay operaciones
			 ?>
<script>
	$("#wellcome").hide();
</script>
<div class="jumbotron">
	<h2>No hay operaciones</h2>
	<p>El rango de fechas seleccionado no proporciono ningun resultado de operaciones.</p>
</div>

			 <?php endif; ?>
<?php else:?>
<script>
	$("#wellcome").hide();
</script>
<div class="jumbotron">
	<h2>Fecha Incorrectas</h2>
	<p>Puede ser que no selecciono un rango de fechas, o el rango seleccionado es incorrecto.</p>
</div>
<?php endif;?>

		<?php endif; ?>
	</div>
</div>

<br><br><br><br>
</section>