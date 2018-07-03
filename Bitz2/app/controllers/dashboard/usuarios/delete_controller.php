<?php
require_once("../../app/models/usuario.class.php");
try{
	if(isset($_GET['id'])){
		if($_GET['id']){
			$usuario = new Usuario;
			if($usuario->setId($_GET['id'])){
				if($usuario->readUsuario()){
					if(isset($_POST['eliminar'])){
						if($usuario->deleteUsuario()){
							Page::showMessage(1, "Usuario eliminado", "index.php");
						}else{
							throw new Exception(Database::getException());
						}
					}
				}else{
					throw new Exception("Usuario inexistente");
				}
			}else{
				throw new Exception("Usuario incorrecto");
			}
		}else{
			throw new Exception("No se puede eliminar a sí mismo");
		}
	}else{
		Page::showMessage(3, "Seleccione usuario", "index.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "index.php");
}
require_once("../../app/views/dashboard/usuarios/delete_view.php");
?>