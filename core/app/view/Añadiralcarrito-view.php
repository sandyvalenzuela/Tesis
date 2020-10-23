<?php

if(!isset($_SESSION["cart"])){


	$Producto = array("Producto_id"=>$_POST["Producto_id"],"q"=>$_POST["q"]);
	$_SESSION["cart"] = array($Producto);


	$cart = $_SESSION["cart"];

///////////////////////////////////////////////////////////////////
		$num_succ = 0;
		$process=false;
	//	$errors = array();
		foreach($cart as $c){

			///
			$q = OperacionData::getQNoF($c["Producto_id"],$cut->id);
			print_r($c);
		//	echo ">>".$q;
			/*	if($c["q"]<=$q){
				$num_succ++;


			}else{
				$error = array("Producto_id"=>$c["Producto_id"],"message"=>"No hay suficiente cantidad de producto en inventario.");
				$errors[count($errors)] = $error;
			}*/

		}
///////////////////////////////////////////////////////////////////

//echo $num_succ;
if($num_succ==count($cart)){
	$process = true;
}
if($process==false){
	unset($_SESSION["cart"]);
//$_SESSION["errorsn"] = $errors;
	?>	
<script>
	window.location="index.php?view=Pedido";
</script>
<?php
}




}else {

$found = false;
$cart = $_SESSION["cart"];
$index=0;

$q = OperacionData::getQYesF($_POST["Producto_id"],$cut->id);





$can = true;
/*if($_POST["q"]<=$q){
}else{
	$error = array("Producto_id"=>$_POST["Producto_id"],"message"=>"No hay suficiente cantidad de producto en inventario.");
	$errors[count($errors)] = $error;
	$can=false;
}*/

//if($can==false){
//$_SESSION["errors"] = $errors;
	?>	
<!-- <script>
	window.location="index.php?view=pedidos";
</script> -->

<?php

?>

<?php
if($can==true){
foreach($cart as $c){
	if($c["Producto_id"]==$_POST["Producto_id"]){
		echo "found";
		$found=true;
		break;
	}
	$index++;
	//print_r($c);
	//print "<br>";
}

if($found==true){
	$q1 = $cart[$index]["q"];
	$q2 = $_POST["q"];
	$cart[$index]["q"]=$q1+$q2;
	$_SESSION["cart"] = $cart;
}

if($found==false){
    $nc = count($cart);
	$Producto = array("Producto_id"=>$_POST["Producto_id"],"q"=>$_POST["q"]);
	$cart[$nc] = $Producto;
	//print_r($cart);
	//$_SESSION["cartn"] = $cart;
}

}
}
 print "<script>window.location='index.php?view=Pedidos';</script>";


?>