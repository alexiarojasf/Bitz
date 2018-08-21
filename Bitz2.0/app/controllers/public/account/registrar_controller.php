<?php 
require_once("../app/models/cliente.class.php");

try{
  $usuario = new Usuario;
  if(isset($_POST['crear'])){
      $_POST = $usuario->validateForm($_POST);
      if($usuario->setAlias($_POST['usuario'])){
        if($usuario->setCorreo($_POST['correo'])){ 
            if($_POST['clave1'] == $_POST['clave2']){ 4
                if($usuario->setClave($_POST['clave1'])){ 
                    if($usuario->createUsuario()){
                        Page::showMessage(1, "Usuario creado", "index.php");
                    }else{
                        throw new Exception(Database::getException());
                        Page::showMessage(1, "Fallo");
                    }
                }else{
                    throw new Exception("Clave menor a 6 caracteres");
                }
            }else{
                throw new Exception("Claves diferentes");
            }
        }else{
            throw new Exception("Correo incorrecto");
        }
      }else{
        throw new Exception("Alias incorrecto");
      }
  }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../app/views/public/account/nuevacuenta_view.php");
?>