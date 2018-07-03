<?php
require_once("../../app/models/proveedor.class.php");
try{
	$proveedor = new Proveedor;
	if(isset($_POST['buscar'])){
		$_POST = $proveedor->validateForm($_POST);
		$data = $proveedor->searchProveedores($_POST['busqueda']);
		if($data){
			$rows = count($data);
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $proveedor->getProveedores();
		}
	}else{
		$data = $proveedor->getProveedores();
	}
	if($data){
		require_once("../../app/views/dashboard/clientes/index.php");
	}else{
		Page::showMessage(3, "No hay categorías disponibles", "create.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
?>