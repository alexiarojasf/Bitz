<?php
require_once("../app/models/detalle.class.php");
try{
	if(isset($_GET['id'])){
		$detal = new Detalle;
		if($detal->setId($_GET['id'])){
			if($detal->getCarrito()){
				if(isset($_POST['eliminar'])){
					if($detal->deleteDetalle()){
							Page::showMessage(1, "Producto eliminado", "carrito.php");
					}else{
						throw new Exception(Database::getException());
					}
				}
			}else{
				throw new Exception("Producto inexistente");
			}
		}else{
			throw new Exception("Producto incorrecta");
		}
	}else{
		Page::showMessage(3, "Producto categoría", "carrito.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "carrito.php");
}
require_once("../app/views/public/carrito/delete_view.php");
?>
