<?php
require_once('../app/helpers/validator.class.php');
require_once('../app/models/database.class.php');
require_once('../app/models/factura.class.php');//se llama el modelo de mangas
try{
    if(isset($_GET['id'])){
        $factura = new Factura;//Try con la funcion de buscar
        if($factura->setId($_GET['id'])){
            if($data = $factura->getDetalleFactura())
            {
             //require_once("../app/views/public/dashboard/detalle_view.php"); 
            }
        }else{
            throw new Exception("Murio");
        }
    }else{
        throw new Exception("Murio x2");
    }
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../public/detalle_factura.php");
}
?>