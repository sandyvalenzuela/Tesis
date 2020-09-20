<div class="row">
<div class="col-md-12">
<h1>Configuracion</h1>

<?php

$configuracions = ConfiguracionData::getAll();

?>

<?php if(count($configuracions)>0):?>
<br>
<table class="table table-bordered">
<thead>
	<th>Clave</th>
	<th>Valor</th>
</thead>
<?php foreach($configuracions as $conf):?>
<tr>
	<td><?php echo $conf->nombre;?></td>
	<td>
		<?php if($conf->tipo==1): // es boolean?>
			<input type="checkbox" nombre="<?php echo $conf->titulo;?>" <?php if($conf->val=="1"){ echo "checked";}?>>
		<?php elseif($conf->tipo==2):?>
			<input type="text" class="form-control input-sm" nombre="<?php echo $conf->titulo;?>" value="<?php echo $conf->val;?>">
		<?php endif; ?>
	</td>
</tr>
<?php endforeach;?>
</table>

<?php endif; ?>


</div>
</div>
