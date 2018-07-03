<?php
// Controlador para agregar productos al carrito
require_once("../app/models/detalle.class.php");
try{         
    $agregar = new Detalle;
        if(isset($_POST['agregar'])){
            $_POST = $agregar->validateForm($_POST);
            if($agregar->setCantidad($_POST['cantidad'])){
                if($agregar->setFactura($_SESSION['id_factura'])){
                    if($agregar->setProducto($_GET['id'])){
                        if(!$agregar->readCarrito()){
                           if($agregar->createDetalle()){
                                Page::showMessage(1, "Producto añadido al carrito", null);
                            }else{
                                throw new Exception(Database::getException());
                            }
                        }else{
                            Page::showMessage(4, "Producto ya esta añadido", null);
                             }
                    }else{
                            throw new Exception("Producto incorrecto");
                         }
                }else{
                    throw new Exception("Usuario incorrectos");
                }
            }else{
                throw new Exception("Cantidad incorrectos");
            }
        }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}

?>