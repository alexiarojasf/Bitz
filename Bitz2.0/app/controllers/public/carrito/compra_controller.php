<?php
 //Controlador para poder realizar una compra
require_once("../app/models/factura.class.php"); 
require_once("../app/models/detalle.class.php");
try{ 
if(isset($_POST['comprar'])){
    $factura = new Factura;
    $detalle = new Detalle;
      $_POST = $factura->validateForm($_POST);
      if($factura->setId($_SESSION['id_factura'])){
        $productos = $detalle->getCarrito();
        if ($productos) {                        
          $cantidades = count($productos);
          for ($i=0; $i < $cantidades ; $i++){
            if($productos[$i]['cantidad_prod']>=$productos[$i]['cantidad_prod']){
              $factura->setId($_SESSION['id_factura']);
              if($factura->updateFactura()){
                Page::showMessage(1, "Compra Realizada", 'principal.php');
              }else{
                throw new Exception(Database::getException());
              }
            }else{
                Page::showMessage(2, "No se puede realizar compra porque no hay suficientes productos",null);
              }
          }
        }else{
          Page::showMessage(2, "ERROR EN ALGO", 'index.php');
           }
      }else{
        throw new Exception("NO CLIENTE");
      }
}
}catch(Exception $error){
Page::showMessage(2, $error->getMessage(), 'index.php');
}
//--------------------------------------------------------------------------
?>