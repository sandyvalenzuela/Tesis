<?php
$found=true;
$Productos = ProductoData::getAll();
	?>

	
<div class="row">
	<div class="col-md-12 text-white bg-blue">
	    <h1>Bienvenido al Sistema de Pedidos </h1>
</div>
</div>
<br><br><br><br>
  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo count(ProductoData::getAll());?></h3>

              <p>Productos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="./?view=Productos" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		   <div class="col-lg-3 col-xs-6">    
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count(CategoriaData::getAll());?></h3>
             <p>Categorias</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="./?view=Categoria" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">    
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count(PresentacionData::getAll());?></h3>
             <p>Presentacion</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="./?view=Presentacion" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		   
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count(UserData::getAll());?></h3>
             <p>Usuarios</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="./?view=users" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
              		
		
        <!-- ./col -->
		
      </div>
      <!-- /.row -->

<div class="row">
	<div class="col-md-12">
<?php if($found):?>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/Productos-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
<?php endif;?>

</div>
<div class="clearfix"></div>
<?php if(count($Producto)>0){?>
<br><table class="table table-bordered table-hover">
	<thead>
		<th >Id</th>
		<th>Nombre</th>
		<th>Categoria</th>
		<th>Presentacion</th>
    <th>Cantidad</th>
		<th></th>
	</thead>
	<?php
foreach($Productos as $Producto):
  $Categoria =  $Producto->getCategoria();
  $Presentacion =  $Producto->getPresentacion();
	?>

	<tr>
		<td><?php echo $Producto->IdProducto; ?></td>
		<td><?php echo $Producto->NombreProducto; ?></td>
		<td><?php echo $Categoria->nombreCategoria; ?></td>
		<td><?php echo $Presentacion->nombrePresentacion; ?></td>
    <td><?php echo $Producto->Cantidad; ?></td>
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
		<h2>No hay existencia de Productos</h2>
		<p>No hay existencia de Productos en el Sistema...</p>
	</div>
	<?php
}

?>
<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>