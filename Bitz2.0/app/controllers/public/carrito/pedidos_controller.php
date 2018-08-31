<?php
require_once("../app/models/factura.class.php");//se llama el modelo de mangas
try{
	$_SESSION['lapso'] = time();
	if(isset($_GET['id'])){  
	$factura = new Factura;//Try con la funcion de buscar
	$data = $factura->getMisFacturas();
}else{
    Page::showMessage(2, "Debes iniciar sesión", "index.php"); 
}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
require_once("../app/views/public/dashboard/pedidos_view.php"); //se llama la vista de del index de productos
?>