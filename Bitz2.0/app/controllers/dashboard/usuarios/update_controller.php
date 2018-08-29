<?php
require_once("../../app/models/usuario.class.php");
$hoy = date("Y-m-d");

try{
    if(isset($_GET['id'])){
        $usuario = new Usuario;
        if($usuario->setId($_GET['id'])){
            if($usuario->readUsuario()){
                if(isset($_POST['actualizar'])){
                    $usuario->setFechaHoy($hoy);
                    if($usuario->setAlias($_POST['usuario'])){
                        if($usuario->setNombres($_POST['nombre'])){
                            if($usuario->setApellidos($_POST['apellido'])){
                                if($usuario->setTelefono($_POST['telefono'])){
                                    if($usuario->setClave($_POST['clave1'])){
                                        if($usuario->checkPassword()){
                                            if($_POST['usuario']==$_POST['clave2']){
                                                throw new Exception("La contraseña no puede ser el nombre de usuario");
                                            }else if($_POST['clave2'] == $usuario->getClave()){
                                                if($usuario->setClave($_POST['clave2'])){
                                                    $contra = $_POST['clave2'];
                                                        if(strlen($contra) >= 8){
                                                            //PREG_MATCH <- HACE UNA COMPARACIÓN
                                                            if(preg_match('`[a-z]`', $contra)){
                                                                if(preg_match('`[A-Z]`', $contra)){
                                                                    if(preg_match('`[0-9]`', $contra)){
                                                                        $especiales = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
                                                                    if(preg_match($especiales, $contra)){
                                                                       
                                                                            if($usuario->setCorreo($_POST['correo'])){
                                                                            if($usuario->setDireccion($_POST['direccion'])){
                                                                                if($usuario->setIdTipoUsuario($_POST['tipousu'])){
                                                                                    if($usuario->setImagen($_POST['foto'])){
                                                                            if($usuario->updateUsuario()){
                                                                                Page::showMessage(1, "Usuario actualizado | Los cambios de imagen se visualizaran hasta el siguiente inicio de sesión ", "index.php");
                                                                            }else{
                                                                                throw new Exception(Database::getException());
                                                                                Page::showMessage(1, "Fallo");
                                                                            }
                                                                        }else{
                                                                            $usuario->setImagen($usuario->getImagen());
                                                                            if($usuario->updateUsuario()){
                                                                                Page::showMessage(1, "Usuario actualizado | Los cambios de imagen se visualizaran hasta el siguiente inicio de sesión ", "index.php");
                                                                            }else{
                                                                                throw new Exception(Database::getException());
                                                                                Page::showMessage(1, "Fallo");
                                                                            }
                                                                        }
                                                                        }else{
                                                                            throw new Exception("No agrego el tipo");
                                                                        }
                                                                    }else{
                                                                        throw new Exception("No agrego la direccion");
                                                                    }
                                                                    }else{
                                                                        throw new Exception("No agrego el correo");
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
                                                                throw new Exception("La contraseña debe tener al menos un caracter alfanúmerico");
                                                            }
                                                        }else{
                                                            throw new Exception("La contraseña debe ser igual o mayor a 8 caracteres");
                                                        }  
                                                    }else{
                                                        throw new Exception("Clave menor a 8 caracteres");
                                                    }
                                                }else{
                                                    throw new Exception("La clave no coincide con la anterior");
                                                }
                                        }else{
                                            throw new Exception("Contraseña incorrecta");
                                        }
                                    }else{
                                        throw new Exception("Debe utilizar la contraseña anterior");
                                    }
                                    }else{
                                        throw new Exception("No agrega el telefono");
                                    }                        
                            }else{
                                throw new Exception("Apellidos incorrectos");
                            }
                        }else{
                            throw new Exception("Nombres incorrectos");
                        }
                    }else{
                        throw new Exception("Alias incorrecto");
                    }
                }
            }
        }
    }
}catch (Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/usuarios/update_view.php");
?>