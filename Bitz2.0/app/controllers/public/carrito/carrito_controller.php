<?php
require_once("../app/models/detalle.class.php");//se llama el modelo de mangas
try{
	$detalle = new Detalle;//Try con la funcion de buscar
	$data = $detalle->getCarrito();
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
require_once("../app/views/public/carrito/carrito_view.php"); //se llama la vista de del index de productos
?>