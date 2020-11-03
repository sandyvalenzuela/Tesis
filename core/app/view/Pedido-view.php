<div class="row">
	<div class="col-md-12">
	<h1>Pedidos</h1>
	<p><b>Buscar producto por nombre o por codigo:</b></p>
		<form id="searchp">
		<div class="row">
			<div class="col-md-6">
				<input type="hidden" name="view" value="Pedido">
				<input type="text" id="Producto_codigo" name="Producto" class="form-control">
			</div>
			<div class="col-md-3">
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
			</div>
		</div>
		</form>
	</div>
<div id="show_search_results"></div>
<script>

//jQuery.noConflict();
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
    $("#product_codigo").keydown(function(e){
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


<!--- Carrito de pedidos -->
<?php if(isset($_SESSION["cart"])):
$total = 0;
?>
<h2>Lista de Pedidos</h2>
<table class="table table-bordered table-hover">
<thead>
	<th style="width:30px;">Codigo</th>
  <th style="width:30px;">Producto</th>
	<th style="width:30px;">Cantidad</th>
	<th ></th>
</thead>
<?php foreach($_SESSION["cart"] as $p):
$Producto = ProductoData::getById($p["Producto_id"]);
?>
<tr>
	<td><?php echo $Producto->codigo; ?></td>
  <td><?php echo $Producto->nombre; ?></td>
	<td ><?php echo $p["q"]; ?></td>
	<td><b><?php  $pt //= $product->price_out*$p["q"]; $total +=$pt; 	//echo number_format($pt); ?></b></td>
	<td style="width:30px;"><a href="index.php?view=Vaciarcarro&Producto_id=<?php echo $Producto->id; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a></td>
</tr>
<?php endforeach; ?>
</table>
<form method="post" class="form-horizontal" id="processopedido" action="index.php?view=Procesopedido">
<h2></h2>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Clinicas</label>
    <div class="col-lg-10">
    <?php 
$Clinicas = ClinicaData::getClinicas();
    ?>
    <select name="Clinica_id" class="form-control">
    <option value="">-- NINGUNO --</option>
    <?php foreach($Clinicas as $Clinica):?>
    	<option value="<?php echo $Clinica->id;?>"><?php echo $Clinica->nombre;?></option>
    <?php endforeach;?>
    	</select>
    </div>
  </div>

<!--<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descuento</label>
    <div class="col-lg-10">
      <input type="text" name="discount" class="form-control" required value="0" id="discount" placeholder="Descuento">
    </div>
  </div>
 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Efectivo</label>
    <div class="col-lg-10">
      <input type="text" name="money" required class="form-control" id="money" placeholder="Efectivo">
    </div>
  </div>
      <input type="hidden" name="total" value="<?php //echo $total; ?>" class="form-control" placeholder="Total">-->

      <div class="row">
<div class="col-md-6 col-md-offset-6">
<table class="table table-bordered">
<!--<tr>
	<td><p>Subtotal</p></td>
	<td><p><b>$ <?php //echo number_format($total*.84); ?></b></p></td>
</tr>
<tr>
	<td><p>IVA</p></td>
	<td><p><b>$ <?php //echo number_format($total*.16); ?></b></p></td>
</tr>
<tr>
	<td><p>Total</p></td>
	<td><p><b>$ <?php //echo number_format($total); ?></b></p></td>
</tr>-->



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
        <button class="btn btn-lg btn-primary">Finalizar Pedido</button>
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