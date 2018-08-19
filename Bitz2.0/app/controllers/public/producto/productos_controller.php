<?php
require_once("../app/models/producto.class.php");
try{
	if(isset($_GET['id'])){
		$producto = new Producto;
		if($producto->setCategoria($_GET['id'])){
			$productos = $producto->getCategoriaProductos();
			if($productos){
				require_once("../app/views/public/productos/productos_view.php");
			}else{
				throw new Exception("No hay productos disponibles");
			}
		}else{
			throw new Exception("Categoría incorrecta");
		}
	}else{
		throw new Exception("Seleccione categoría");
	}
}catch(Exception $error){
	Page::showMessage(3, $error->getMessage(), "index.php");
}
?>