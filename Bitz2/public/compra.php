<!--Index//-->
<?php
require_once "../app/controllers/public/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Carrito");
require_once "../app/controllers/public/carrito/compra_controller.php";
Page::templateFooter();
?>
<!--//Index-->