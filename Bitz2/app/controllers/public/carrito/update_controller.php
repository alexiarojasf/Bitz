<?php
require_once("../app/models/detalle.class.php");
require_once("../app/models/producto.class.php");
try{
    if(isset($_GET['id'])){
        $detalle = new Detalle;
        if($detalle->setId($_GET['id'])){
            if($detalle->getCarrito()){
                if(isset($_POST['actualizar'])){
                    $_POST = $detalle->validateForm($_POST);
                    if($detalle->setCantidad($_POST['cantidad'])){
                            if($detalle->updateCantidadLlevar()){
                                Page::showMessage(1, "Cantidad modificada modificado", "carrito.php");
                            }else{
                                throw new Exception(Database::getException());
                            }
                    }else{
                        throw new Exception("Nombre incorrecto");
                    }
                }
            }else{
                Page::showMessage(2, "Producto inexistente", "index.php");
            }
        }else{
            Page::showMessage(2, "Producto incorrecto", "index.php");
        }
    }else{
        Page::showMessage(3, "Seleccione producto", "index.php");
    }
}catch (Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../app/views/public/carrito/update_view.php");
?>