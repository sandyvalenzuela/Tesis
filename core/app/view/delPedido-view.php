<?php

$Pedido = PedidoData::getById($_GET["id"]);
$operaciones = OperacionData::getAllProductosByPedidoId($_GET["id"]);

foreach ($operaciones as $op) {
	$op->del();
}

$Pedido->del();
Core::redir("./index.php?view=Pedidos");

?>