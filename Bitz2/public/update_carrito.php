<!--ELIMINAR CARRITO-->
<?php
require_once "../app/controllers/public/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Productos");
require_once "../app/controllers/public/carrito/update_controller.php";
Page::templateFooter();
?>