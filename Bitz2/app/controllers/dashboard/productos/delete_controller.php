<?php
require_once("../../app/models/producto.class.php");
try{
	if(isset($_GET['id'])){
		$producto = new Producto;
		if($producto->setId($_GET['id'])){
			if($producto->readProducto()){
				if(isset($_POST['eliminar'])){
					if($producto->deleteProducto()){
						Page::showMessage(1, "Producto eliminado", "index.php");
					}else{
						throw new Exception(Database::getException());
					}
				}
			}else{
				throw new Exception("Producto inexistente");
			}	
		}else{
			throw new Exception("Producto incorrecto");
		}
	}else{
		Page::showMessage(3, "Seleccione producto", "index.php");
	}
}catch (Exception $error){
	Page::showMessage(2, $error->getMessage(), "index.php");
}
require_once("../../app/views/dashboard/productos/delete_view.php");
?>