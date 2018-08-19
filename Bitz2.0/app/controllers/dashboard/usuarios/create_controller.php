<?php
require_once("../../app/models/usuario.class.php");
try{
    $usuario = new Usuario;
    if(isset($_POST['crear'])){
        $_POST = $usuario->validateForm($_POST);
        if($usuario->setAlias($_POST['usuario'])){
        if($usuario->setNombres($_POST['nombre'])){
            if($usuario->setApellidos($_POST['apellido'])){
                if($usuario->setTelefono($_POST['telefono'])){
                    if($_POST['clave1'] == $_POST['clave2']){
                        if($usuario->setClave($_POST['clave1'])){
                            if($usuario->setCorreo($_POST['correo'])){
                                if($usuario->setDireccion($_POST['direccion'])){
                                    if($usuario->setIdTipoUsuario($_POST['tipousu'])){
                                        if($usuario->setImagen($_POST['foto'])){
                                if($usuario->createUsuario()){
                                    Page::showMessage(1, "Usuario creado", "index.php");
                                }else{
                                    throw new Exception(Database::getException());
                                    Page::showMessage(1, "Fallo");
                                }
                            }else{
                                throw new Exception("No agrego la foto");
                            }
                            }else{
                                throw new Exception("No agrego el tipo");
                            }
                        }else{
                            throw new Exception("No agrego la direccion");
                        }
                         }else{
                            throw new Exception("Correo incorrecto");
                        }
                            }else{
                                throw new Exception("Clave menor a 6 caracteres");
                            }
                        }else{
                            throw new Exception("Claves diferentes");
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
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/usuarios/create_view.php");
?>