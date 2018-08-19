<?php
require_once("../../app/models/producto.class.php");
try{
    if(isset($_GET['id'])){
        $producto = new Producto;
        if($producto->setId($_GET['id'])){
            if($producto->readProducto()){
                if(isset($_POST['actualizar'])){
                    $_POST = $producto->validateForm($_POST);
                    if($producto->setNombre($_POST['nombre'])){
                        if($producto->setDescripcion($_POST['descripcion'])){
                        if($producto->setCantidad($_POST['cantidad'])){
                        if($producto->setPrecio($_POST['precio'])){
                                if($producto->setCategoria($_POST['categoria'])){
                                    if($producto->setProveedor($_POST['proveedor'])){
                                    if($producto->setModelo($_POST['modelo'])){
                                    if($producto->setEstado(isset($_POST['estado']))){
                                        if($producto->setImagen($_POST['foto'])){
                                                if($producto->updateProducto()){
                                                    Page::showMessage(1, "Producto creado", "index.php");
                                                }else{
                                                    throw new Exception("No url");
                                                }
                                            }else{
                                                throw new Exception("No url");
                                            }
                                    }else{
                                        throw new Exception("Estado incorrecto");
                                    }
                                }else{
                                    throw new Exception("Introduce un modelo");
                                }
                                }else{
                                    throw new Exception("Selecciona un proveedor");
                                }
                                }else{
                                    throw new Exception("Seleccione una categoría");
                                }
                            }else{
                                throw new Exception("Precio incorrecto");
                            }
                        }else{
                            throw new Exception("Cantidad no valida");
                        }
                            }else{
                                throw new Exception("Descripción incorrecta");
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
require_once("../../app/views/dashboard/productos/update_view.php");
?>