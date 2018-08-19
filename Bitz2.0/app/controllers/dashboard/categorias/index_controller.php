<?php
require_once("../../app/models/categoria.class.php");
try{
	$categoria = new Categoria;
	if(isset($_POST['buscar'])){
		$_POST = $categoria->validateForm($_POST);
		$data = $categoria->searchCategoria($_POST['busqueda']);
		if($data){
			$rows = count($data);
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $categoria->getCategorias();
		}
	}else{
		$data = $categoria->getCategorias();
	}
	if($data){
		require_once("../../app/views/dashboard/categorias/index.php");
	}else{
		Page::showMessage(3, "No hay categorías disponibles", "create.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
?>