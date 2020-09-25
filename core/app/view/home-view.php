	<?php
	$found=true;
$Productos = ProductoData::getAll();


	?>
<div class="row">
	<div class="col-md-12">
		<h1>Bienvenido al Sistema de Pedidos</h1>
</div>
</div>
  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count(ProductoData::getAll());?></h3>

              <p>Productos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="./?view=Productos" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo count(PersonaData::getClientes());?></h3>

              <p>Clientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="./?view=clientes" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
             
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count(CategoriaData::getAll());?></h3>

              <p>Categorias</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="./?view=Categorias" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

<!-- ./col -->



<div class="row">
	<div class="col-md-12">
<?php if($found):?>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/alerts-word.php">Word 2010 (.docx)</a></li>
  </ul>
</div>
<?php endif;?>

</div>
<div class="clearfix"></div>
<?php if(count($Productos)>0){?>
<br><table class="table table-bordered table-hover">
	<thead>
		<th >Codigo</th>
		<th>Nombre del producto</th>
    <th>Categoria</th>
	</thead>
  <?php
foreach($Productos as $Producto):
	$Categoria =  $Producto->getCategoria();
	?>

	<tr>
		<td><?php echo $Producto->id; ?></td>
		<td><?php echo $Producto->nombre; ?></td>
		<td><?php echo $Categoria->nombre; ?></td>
	</tr>

<?php
endforeach;
?>

</table>

<div class="clearfix"></div>

	<?php
}else{
	?>
	<div class="jumbotron">
		<h2>No hay alertas</h2>
		</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>