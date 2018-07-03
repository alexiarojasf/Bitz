<?php
require_once("../app/models/factura.class.php");//se llama el modelo de mangas
try{
	$factura = new Factura;//Try con la funcion de buscar
	$data = $factura->getMisFacturas();
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
require_once("../app/views/public/dashboard/pedidos_view.php"); //se llama la vista de del index de productos
?>