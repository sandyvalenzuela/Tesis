<?php

if(isset($_SESSION["cart"])){
	$cart = $_SESSION["cart"];
	if(count($cart)>0){

		$num_succ = 0;
		$process=false;
		$errors = array();
	
		?>
		<?php
}

		if($process==true){
			$Pedido = new PedidoData();
			$Pedido->Usuario_id = $_SESSION["Usuario_id"];
			$Pedido->discount = $_POST["discount"];


			 if(isset($_POST["Personal_id"]) && $_POST["Personal_id"]!="") {
			 	$Pedido->Persona_id=$_POST["Personal_id"];
 				$s = $Pedido->add_with_Personal();
			 }else{
 				$s = $Pedido->add();
			 }
			 if(isset($_POST["Clinica_id"]) && $_POST["Clinica_id"]!="") {
				$Pedido->Clinica_id=$_POST["Clinica_id"];
				$s = $Pedido->add_with_Clinica();
			}else{
				$s = $Pedido->add();
			}

		foreach($cart as  $c){
			$op = new OperacionData();
			 $op->Producto_id = $c["Producto_id"] ;
			 $op->operaciontipo_id=OperacionTipoData::getByName("salida")->id;
			 $op->Pedido_id=$s[1];
			 $op->q= $c["q"];

			$add = $op->add();			 		

			unset($_SESSION["cart"]);
			setcookie("vendido","vendido");
		}
print "<script>window.location='index.php?view=onePedido&id=$s[1]';</script>";
	}
}
?>