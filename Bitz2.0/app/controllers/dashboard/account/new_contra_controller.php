<?php
require_once("../../app/models/usuario.class.php");
$hoy = date("Y-m-d");

try{
	$object = new Usuario;
	if($object->getUsuarios()){ 
		if(isset($_POST['actualizar'])){
            $_POST = $object->validateForm($_POST);
            $hoy = date("Y-m-j");
            $object->setFechaHoy($hoy);
			if($object->setAlias($_POST['alias'])){
				if($object->checkAlias()){
					if($object->setClave($_POST['claveAntigua'])){
                        $contra = $_POST['clave'];
                        if(strlen($contra) >= 8){
                            //PREG_MATCH <- HACE UNA COMPARACIÓN
                            if(preg_match('`[a-z]`', $contra)){
                                if(preg_match('`[A-Z]`', $contra)){
                                    if(preg_match('`[0-9]`', $contra)){
                                        $especiales = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
                                      if(preg_match($especiales, $contra)){
                                        if($object->setClaveNueva($_POST['clave'])){
                                            if($object->getClave()==$object->getClaveNueva()){
                                                throw new Exception("La contraseña no puede ser igual a la anterior");
                                            }else{
                                                if($object->checkPassword()){
                                                    $object->changePassword();
                                                    $_SESSION['id_usuario'] = $object->getId();
                                                    $_SESSION['usuario'] = $object->getAlias();
                                                    $_SESSION['correo_usu'] = $object->getCorreo();
                                                    $_SESSION['foto_usu'] = $object->getImagen();
                                                    $_SESSION['fecha_creacion'] = $object->getFechaHoy();
                                                    $object->logOut();
                                                    Page::showMessage(1, "¡Contraseña actualizada satisfactoriamente!", "index.php");
                                                }else{ 
                                                    throw new Exception("Clave inexistente");
                                                }
                                            }
                                        }

                                      }else{
                                        throw new Exception("La contraseña debe tener al menos un caracter especial");
                                      }
                                    }else{
                                        throw new Exception("La contraseña debe tener al menos un caracter númerico");
                                    }
                                }else{
                                    throw new Exception("La contraseña debe tener por lo menos una letra mayúscula");
                                }
                            }else{
                                throw new Exception("la contraseña debe tener al menos un caracter alfanúmerico");
                            }
                        }else{
                            throw new Exception("La contraseña debe ser igual o mayor a 8 caracteres");
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

require_once("../../app/views/dashboard/account/new_contra_view.php");
?>

