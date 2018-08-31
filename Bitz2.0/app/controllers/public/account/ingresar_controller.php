<?php
require_once("../app/models/cliente.class.php");
try{
	$object = new Usuario;
	if($object->getUsuarios()){$object->getId();
		if(isset($_POST['iniciar'])){
			$_POST = $object->validateForm($_POST);
			if($object->setAlias(htmlentities($_POST['alias']))){
				if($object->checkAlias()){
					if($object->setClave($_POST['clave'])){
						if($object->checkPassword()){
							$_SESSION['id_usuario'] = $object->getId();
							$_SESSION['usuario'] = $object->getAlias();
							$_SESSION['correo_usu'] = $object->getCorreo();
							$_SESSION['fecha_creacion'] = $object->getFechaHoy();
							$_SESSION['tipo_usu'] = $object->getIdTipoUsuario();
							$tipousu = $_SESSION['tipo_usu'];
							$fechaUsu = $_SESSION['fecha_creacion'];
							$fechaLimite = strtotime('+90 day', strtotime($fechaUsu));
							$fechaLimite = date ('Y-m-j',$fechaLimite);
							$hoy = date("Y-m-j");
							if ($hoy >= $fechaLimite) {
								unset
								Page::showMessage(2, "El uso de tu contraseña ha expirado", "../public/cambiar_contrasena.php");
							}
							else{
								Page::showMessage(1, "Autenticación correcta", "../public/index.php");
							}
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
		Page::showMessage(3, "No hay usuarios disponibles", "nuevacuenta.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../app/views/public/account/acceder_view.php");
?>