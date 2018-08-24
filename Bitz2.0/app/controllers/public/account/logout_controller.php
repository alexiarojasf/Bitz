<?php
require_once("../app/models/cliente.class.php");
$object = new Usuario;
if($object->logOut()){
    if($object->SesionUnica2()){
        Page::showMessage(1, "Sesión cerrada exitosamente", "index.php");
    }else{
        throw new Exception("Hubo un problema");
    }   
}else{
    Page::showMessage(2, "Ocurrió un problema", "index.php");
}
?>