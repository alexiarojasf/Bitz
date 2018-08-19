<?php
require_once("../../app/models/producto.class.php");
try{
    $producto = new Producto;
    if(isset($_POST['crear'])){
        $_POST = $producto->validateForm($_POST);
        if($producto->setNombre($_POST['nombre'])){
            if($producto->setDescripcion($_POST['descripcion'])){
            if($producto->setCantidad($_POST['cantidad'])){
            if($producto->setPrecio($_POST['precio'])){
                    if($producto->setCategoria($_POST['categoria'])){
                        if($producto->setProveedor($_POST['proveedor'])){
                        if($producto->setModelo($_POST['modelo'])){
                        if($producto->setEstado(isset($_POST['estado'])?1:2)){
                            if($producto->setImagen($_POST['foto'])){
                                    if($producto->createProducto()){
                                        Page::showMessage(1, "Producto creado", "index.php");
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
}catch (Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/productos/create_view.php");
?>