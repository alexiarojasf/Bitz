<?php
require_once("../../app/models/usuario.class.php");
$object = new Usuario;
if($object->logOut()){
    Page::showMessage(1, "Sesión cerrada exitosamente", "index.php");
}else{
    Page::showMessage(2, "Ocurrió un problema", "index.php");
}
?>