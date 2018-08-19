<?php
require_once("../../app/models/usuario.class.php");
try{
	$usuario = new Usuario;
	if(isset($_POST['buscar'])){
		$_POST = $usuario->validateForm($_POST);
		$data = $usuario->searchUsuario($_POST['busqueda']);
		if($data){
			$rows = count($data);
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $usuario->getUsuarioss();
		}
	}else{
		$data = $usuario->getUsuarioss();
	}
	if($data){
		require_once("../../app/views/dashboard/usuarios/clientes_view.php");
	}else{
		Page::showMessage(3, "No hay usuarios disponibles", "create.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
?>