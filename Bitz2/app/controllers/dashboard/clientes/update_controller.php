<?php
require_once("../../app/models/proveedor.class.php");
try{
    if(isset($_GET['id'])){
        $proveedor = new Proveedor;
        if($proveedor->setId($_GET['id'])){
            if($proveedor->readProveedor()){
                if(isset($_POST['actualizar'])){
                    $_POST = $proveedor->validateForm($_POST); 
                    if($proveedor->setNombre($_POST['nombre'])){
                            if($proveedor->updateProveedor()){
                                Page::showMessage(1, "Proveedor modificado", "index.php");
                            }else{
                                throw new Exception(Database::getException());
                            }                       
                    }else{
                        throw new Exception("Proveedor con caracteres no validos");
                    }                    
                }
            }else{
                Page::showMessage(2, "Proveedor inexistente", "index.php");
            }
        }else{
            Page::showMessage(2, "Proveedor incorrecta", "index.php");
        }        
    }else{
        Page::showMessage(3, "Seleccione proveedor", "index.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/clientes/update_view.php");
?>