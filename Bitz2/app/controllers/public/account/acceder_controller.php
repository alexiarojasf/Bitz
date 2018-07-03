<?php
require_once("../app/models/cliente.class.php");
try{
	$object = new Usuario;
	if($object->getUsuarios()){$object->getId();
		if(isset($_POST['iniciar'])){
			$_POST = $object->validateForm($_POST);
			if($object->setAlias($_POST['alias'])){
				if($object->checkAlias()){
					if($object->setClave($_POST['clave'])){
						if($object->checkPassword()){
							$_SESSION['id_usuario'] = $object->getId();
							$_SESSION['usuario'] = $object->getAlias();
							$_SESSION['correo_usu'] = $object->getCorreo();       
						
							Page::showMessage(1, "Autenticación correcta", "../public/index.php");
						}else{ 
							throw new Exception("Clave inexistente");
						}
					}else{
						throw new Exception("Clave menor a 6 caracteres");
					}
				}else{
					throw new Exception("Alias inexistente");
				}
			}else{
				throw new Exception("Alias incorrecto");
			}
		}
	}else{
		Page::showMessage(3, "No hay usuarios disponibles", "register.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../app/views/public/account/acceder_view.php");
?>