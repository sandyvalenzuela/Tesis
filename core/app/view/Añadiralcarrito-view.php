<?php

if(!isset($_SESSION["cart"])){


	$Producto = array("Producto_id"=>$_POST["Producto_id"],"q"=>$_POST["q"]);
	$_SESSION["cart"] = array($Producto);


	$cart = $_SESSION["cart"];


//////////////////////////////////////////////////////////////////
$num_succ = 0;
$process=false;
//$errors = array();
foreach($cart as $c){

	///
	$q = OperacionData::getQYesF($c["Producto_id"]);
	$num_succ++;
//			echo ">>".$q;
	/*if($c["q"]<=$q){
		$num_succ++;
		


	/*}else{
		$error = array("product_id"=>$c["product_id"],"message"=>"No hay suficiente cantidad de producto en inventario.");
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
//$_SESSION["errors"] = $errors;
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

$q = OperacionData::getQYesF($_POST["Producto_id"]);





$can = true;
/*if($_POST["q"]>=$q){
}else{
$error = array("product_id"=>$_POST["product_id"],"message"=>"No hay suficiente cantidad de producto en inventario.");
$errors[count($errors)] = $error;
$can=false;
}*/

//if($can==false){
//$_SESSION["errors"] = $errors;
?>	
<!-- <script>

window.location="index.php?view=sell";
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

}

if($found==true){
	$q1 = $cart[$index]["q"];
	$q2 = $_POST["q"];
	$cart[$index]["q"]=$q1+$q2;
	$_SESSION["cart"] = $cart;
}

if($found==false){
    $nc = count($cart);
	$product = array("Producto_id"=>$_POST["Producto_id"],"q"=>$_POST["q"]);
	$cart[$nc] = $Producto;

	$_SESSION["cart"] = $cart;
}

}
}
 print "<script>window.location='index.php?view=Pedido';</script>";


?>