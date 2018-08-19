<?php
require_once("../../app/models/proveedor.class.php");
try{
    $proveedor = new Proveedor;
    if(isset($_POST['crear'])){
        $_POST = $proveedor->validateForm($_POST);
        if($proveedor->setNombre($_POST['nombre'])){
                        if($proveedor->createProveedor()){
                            Page::showMessage(1, "Proveedor creado", "index.php");
                        }else{     
                            throw new Exception("No se creo el proveedor");
                        }                       
        }else{
            throw new Exception("Nombre incorrecto");
        }        
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once "../../app/views/dashboard/clientes/create_view.php";
?>