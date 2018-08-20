<!--Index//-->
<?php
require_once "../app/controllers/public/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Productos");
require_once "../app/controllers/public/producto/categoria_controller.php";
Page::templateFooter();
?>
<!--//Index-->