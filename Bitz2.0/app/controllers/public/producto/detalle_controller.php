<?php
require_once("../app/models/producto.class.php");
require_once("../app/models/factura.class.php");
require_once("../app/models/detalle.class.php");
try{
    if(isset($_GET['id'])){
        $producto = new Producto;
        $detalle = new Detalle;
        $factura = new Factura;
        if($producto->setId($_GET['id'])){
            if($producto->readProducto2()){
                if(isset($_POST['agregar'])){
                    $_POST = $factura->validateForm($_POST);
                        if($factura->setUsuario($_SESSION['id_usuario'])){
                            if($factura->createFactura()){
                                if($detalle->setFactura($_SESSION['id_factura'])){
                                    if($detalle->setProducto($_GET['id'])){
                                        if($detalle->setCantidad($_POST['cantidad'])){
                                                if($detalle->createDetalle()){
                                                    $nueva_existencia = $producto->getCantidad() - $detalle->getCantidad();
                                                    if($producto->setCantidad($nueva_existencia)){
                                                        if($producto->updateExistencias()){
                                                            Page::showMessage(1, "Se agrego el producto al carrito", null);
                                                        }else{
                                                            throw new Exception(Database::getException()); 
                                                        }
                                                    }else{
                                                        throw new Exception("Error al poner existencias");
                                                    }
                                                }else{
                                                    throw new Exception(Database::getException()); 
                                                }
                                        }else{
                                            throw new Exception("Cantidad no valido");
                                        }
                                    }else{
                                        throw new Exception("Id de producto no valido");
                                    }
                                }else{
                                    throw new Exception("Id detalle no valido");
                                }
                            }else{
                                throw new Exception(Database::getException());
                            }
                        }else{
                            throw new Exception("Cliente no tomado");
                        }
                }
                require_once("../app/views/public/productos/detalles_view.php");
            }else{
                throw new Exception("Producto inexistente");
            }
        }else{
            throw new Exception("Producto incorrecto");
        }
    }else{
        throw new Eception("Seleccione producto");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), "../account/");
}
require_once("../app/views/public/productos/detalles_view.php");
?>