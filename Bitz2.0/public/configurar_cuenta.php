<!--Index//-->
<?php
require_once "../app/controllers/public/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Categorias");
require_once "../app/controllers/public/account/editarc_controller.php";
Page::templateFooter();
?>
<!--//Index-->