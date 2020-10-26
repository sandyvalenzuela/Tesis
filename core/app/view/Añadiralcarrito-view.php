<?php

if(!isset($_SESSION["cart"])){


	$Producto = array("Producto_id"=>$_POST["Producto_id"],"q"=>$_POST["q"]);
	$_SESSION["cart"] = array($Producto);


	$cart = $_SESSION["cart"];


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