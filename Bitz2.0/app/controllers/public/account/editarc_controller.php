<?php
require_once("../app/models/usuario.class.php");
try{
    if(isset($_GET['id'])){
        $usuario = new Usuario;
        if($usuario->setId($_GET['id'])){
            if($usuario->readUsuario()){
                if(isset($_POST['actualizar'])){
                    if($usuario->setAlias($_POST['usuario'])){
                        if($usuario->setNombres($_POST['nombre'])){
                            if($usuario->setApellidos($_POST['apellido'])){
                                if($usuario->setTelefono($_POST['telefono'])){
                                    if($usuario->setCorreo($_POST['correo'])){
                                        if($usuario->setDireccion($_POST['direccion'])){
                                            if($usuario->setImagen($_POST['foto'])){
                                    if($usuario->updateUsuarios()){
                                        Page::showMessage(1, "Usuario actualizado", "index.php");
                                    }else{
                                        throw new Exception(Database::getException());
                                        Page::showMessage(1, "Fallo");
                                    }
                                }else{
                                    throw new Exception("No agrego la foto");
                                }
                            }else{
                                throw new Exception("No agrego la direccion");
                            }
                                }else{
                                throw new Exception("Correo incorrecto");
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
require_once("../app/views/public/account/editar_cuenta.php");
?>