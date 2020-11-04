<?php

if(isset($_SESSION["cart"])){
	$cart = $_SESSION["cart"];
	if(count($cart)>0){
/// antes de proceder con lo que sigue vamos a verificar que:
		// haya existencia de productos
		// si se va a facturar la cantidad a facturr debe ser menor o igual al producto facturado en inventario
		$num_succ = 0;
		$process=false;
		$errors = array();
		foreach($cart as $c){

			$q = OperacionData::getQYesF($c["Producto_id"]);
			//if($c["q"]<=$q){
				if(isset($_POST["is_oficial"])){
				$qyf =OperacionData::getQYesF($c["Producto_id"]); /// son los productos que puedo facturar
				//if($c["q"]<=$qyf){
					$num_succ++;
				/*}else{
				$error = array("product_id"=>$c["product_id"],"message"=>"No hay suficiente cantidad de producto para facturar en inventario3.");					
				$errors[count($errors)] = $error;
				}*/
				}else{
					// si llegue hasta aqui y no voy a facturar, entonces continuo ...
					$num_succ++;
				}
			/*}else{
				$error = array("product_id"=>$c["product_id"],"message"=>"No hay suficiente cantidad de producto en inventario.");
				$errors[count($errors)] = $error;
			}*/

		}

if($num_succ==count($cart)){
	$process = true;
}

if($process==false){
$_SESSION["errors"] = $errors;
	?>	
<script>
	window.location="index.php?view=pedido";
</script>
<?php
}









//////////////////////////////////
		if($process==true){
			$Pedido = new PedidoData();
			$Pedido->Usuario_id = $_SESSION["Usuario_id"];

			//$sell->total = $_POST["total"];
			//$sell->discount = $_POST["discount"];


			    if(isset($_POST["Clinica_id"]) && $_POST["Clinica_id"]!=""){
				 $Pedido->Clinica_id=$_POST["Clinica_id"];
				  if(isset($_POST["Clinica_id"]) && $_POST["Clinica_id"]!=""){
				  $Pedido->Clinica_id2=$_POST["Clinica_id"];
				  }
 				$s = $Pedido->add_with_Clinica();
			 }else{
 				$s = $Pedido->add();
			 }


		foreach($cart as  $c){


			$op = new OperacionData();
			 $op->Producto_id = $c["Producto_id"] ;
			 $op->operacion_tipo_id=OperacionTipoData::getByName("salida")->id;
			 $op->Pedido_id=$s[1];
			 $op->q= $c["q"];

			if(isset($_POST["is_oficial"])){
				$op->is_oficial = 1;
			}

			$add = $op->add();			 		

			unset($_SESSION["cart"]);
			setcookie("selled","selled");
		}
////////////////////
print "<script>window.location='index.php?view=onepedido&id=$s[1]';</script>";
		}
	}
}



?>
