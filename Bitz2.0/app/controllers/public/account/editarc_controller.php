<?php
require_once("../app/models/cliente.class.php");
try{
    $_SESSION['lapso'] = time();
    if(isset($_GET['id'])){
        $usuario = new Usuario;
        if($usuario->setId($_GET['id'])){
            if($usuario->readUsuario()){
                if(isset($_POST['actualizar'])){
                    if($usuario->setAlias(htmlentities($_POST['usuario']))){
                        if($usuario->setNombres(htmlentities($_POST['nombre']))){
                            if($usuario->setApellidos(htmlentities($_POST['apellido']))){
                                if($usuario->setTelefono(htmlentities($_POST['telefono']))){
                                    if($usuario->setCorreo(htmlentities($_POST['correo']))){
                                        if($usuario->setDireccion(htmlentities($_POST['direccion']))){   
                                    if($usuario->updateUsuarios()){
                                        Page::showMessage(1, "Usuario actualizado, vuelva a iniciar sesión para ver los cambios", "index.php");
                                    }else{
                                        throw new Exception(Database::getException());
                                        Page::showMessage(1, "Fallo");
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
}else{
    Page::showMessage(2, "Debes iniciar sesión", "index.php"); 
}
    }
}catch (Exception $error){
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../app/views/public/account/editar_cuenta.php");
?>