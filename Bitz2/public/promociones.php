<!--Index//-->
<?php
require_once "../app/controllers/public/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Productos");
require_once "../app/views/public/promociones/promociones_view.php";
Page::templateFooter();
?>
<!--//Index-->