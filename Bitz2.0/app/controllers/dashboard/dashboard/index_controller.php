<?php
require_once("../../app/models/producto.class.php");
try{
	$producto = new Producto;
	if(isset($_POST['buscar'])){
		$_POST = $producto->validateForm($_POST);
		$data = $producto->searchProducto($_POST['busqueda']);
		if($data){
			$rows = count($data);
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $producto->getProductos2();
		}
	}else{
		$data = $producto->getProductos2();
	}
	if($data){
		require_once("../../app/views/dashboard/dashboard/dashboard_content.php");
	}else{
		Page::showMessage(4, "No hay productos disponibles", "create.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
?>