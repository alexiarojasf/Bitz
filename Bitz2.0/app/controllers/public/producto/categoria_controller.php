<?php
require_once("../app/models/categoria.class.php");
try{
	$categoria = new Categoria;
	$categorias = $categoria->getCategorias();
	if($categorias){
		require_once("../app/views/public/productos/categoria_view.php");
	}else{
		Page::showMessage(3, "No hay categorías disponibles", null);
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
?>