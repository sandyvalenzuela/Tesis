<div class="row">
	<div class="col-md-12">
	<h1>Pedidos</h1>
	<p><b>Buscar producto por nombre o por codigo:</b></p>
		<form id="searchp">
		<div class="row">
			<div class="col-md-6">
				<input type="hidden" name="view" value="Pedido">
				<input type="text" id="Producto_Codigo" name="Producto" class="form-control">
			</div>
			<div class="col-md-3">
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
			</div>
		</div>
		</form>
	</div>
<div id="show_search_results"></div>
<script>


$(document).ready(function(){
	$("#searchp").on("submit",function(e){
		e.preventDefault();
		
		$.get("./?action=BuscarProducto",$("#searchp").serialize(),function(data){
			$("#show_search_results").html(data);
		});
		$("#Producto_codigo").val("");

	});
	});

$(document).ready(function(){
    $("#product_code").keydown(function(e){
        if(e.which==17 || e.which==74){
            e.preventDefault();
        }else{
            console.log(e.which);
        }
    })
});
</script>

<?php if(isset($_SESSION["errors"])):?>
<h2>Errores</h2>
<p></p>
<table class="table table-bordered table-hover">
<tr class="danger">
	<th>Codigo</th>
	<th>Producto</th>
	<th>Mensaje</th>
</tr>
<?php foreach ($_SESSION["errors"]  as $error):
$Producto = ProductoData::getById($error["Producto_id"]);
?>
<tr class="danger">
	<td><?php echo $Producto->id; ?></td>
	<td><?php echo $Product->nombre; ?></td>
	<td><b><?php echo $error["message"]; ?></b></td>
</tr>

<?php endforeach; ?>
</table>
<?php
unset($_SESSION["errors"]);
 endif; ?>


<!--- Carrito de compras :) -->
<?php if(isset($_SESSION["cart"])):
$total = 0;
?>
<h2>Lista de Pedidos</h2>
<table class="table table-bordered table-hover">
<thead>
	<th style="width:30px;">Codigo</th>

	<th ></th>
</thead>
<?php foreach($_SESSION["cart"] as $p):
$Producto = ProductoData::getById($p["Producto_id"]);
?>
<tr >
	<td><?php echo $Producto->id; ?></td>
	<td ><?php echo $p["q"]; ?></td>
	<td><?php echo $Producto->nombre; ?></td>
	<td style="width:30px;"><a href="index.php?view=Vaciarcarro&Producto_id=<?php echo $Producto->id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a></td>
</tr>

<?php endforeach; ?>
</table>
<form method="post" class="form-horizontal" id="processsell" action="index.php?view=Procesopedido">
<h2>Resumen</h2>
<div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Cliente</label>
    <div class="col-lg-10">
    <?php 
$Clientes = PersonaData::getClientes();
    ?>
    <select name="Cliente_id" class="form-control">
    <option value="">-- NINGUNO --</option>
    <?php foreach($Clientes as $Cliente):?>
    	<option value="<?php echo $Cliente->id;?>"><?php echo $Cliente->nombre." ".$client->apellido;?></option>
    <?php endforeach;?>
    	</select>
    </div>
  </div>

</table>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input name="is_oficial" type="hidden" value="1">
        </label>
      </div>
    </div>
  </div>
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
		<a href="index.php?view=Vaciarcarro" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
        <button class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-usd"></i><i class="glyphicon glyphicon-usd"></i> Finalizar Pedido</button>
        </label>
      </div>
    </div>
  </div>
</form>

</div>
</div>

<br><br><br><br><br>
<?php endif; ?>

</div>