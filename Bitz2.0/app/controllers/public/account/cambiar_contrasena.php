<?php
require_once("../app/models/cliente.class.php");
try{
    if(isset($_POST['actualizar'])){    
        $usuario = new Usuario;
        $_POST = $usuario->validateForm($_POST);
        if($usuario->setId($_SESSION['id_usuario'])){ 
            if(htmlentities($_POST['contraactual']) == htmlentities($_POST['contraactual2'])){
                if($usuario->setClave($_POST['contraactual'])){
                    if($usuario->checkPassword()){
                        $contra = $_POST['contranueva'];
                        if($_POST['contraactual'] != $_POST['contranueva']){
                            if($_POST['contranueva'] != $usuario->getAlias()){
                                if($_POST['contranueva'] == $_POST['contranueva2']){
                                    //STRLEN <- MIDE LA LONGITUD DE UN STRING
                                    if(strlen($contra) >= 8){
                                        //PREG_MATCH <- HACE UNA COMPARACIÓN
                                        if(preg_match('`[a-z]`', $contra)){
                                            if(preg_match('`[A-Z]`', $contra)){
                                                if(preg_match('`[0-9]`', $contra)){
                                                    $especiales = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
                                                  if(preg_match($especiales, $contra)){
                                                    if($usuario->setClave(htmlentities($_POST['contranueva']))){
                                                        if($usuario->changePassword()){
                                                            $usuario->FechaCreacion();
                                                            Page::showMessage(1,"Exito, clave actualizada", "../public/index.php");
                                                        }else{
                                                            throw new Exception(Database::getException());
                                                            Page::showMessage(1, "Fallo");
                                                        }
                                                    }else{
                                                        throw new Exception("Contraseña inválida");
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
                                    throw new Exception("Las nuevas claves no coinciden");
                                }
                            }else{
                                throw new Exception("La contraseña no puede ser igual a su usuario");
                            }
                        }else{
                            throw new Exception("Esta clave ha sido utlizada anteriormente, escriba una nueva");
                        }
                    }else{
                        throw new Exception("Contraseña incorrecta, intente de nuevo");
                    }
                }else{
                    throw new Exception("Contraseña inválida");
                }
            }else{
                throw new Exception("Las contraseñas actuales no coinciden");
            }
        }else{
            Page::showMessage(2, "Usuario incorrecto", "../public/cambiar_contrasena.php");
        }
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../app/views/public/account/cambiar_contrasena.php");
?>