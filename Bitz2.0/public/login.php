<!--Index//-->
<?php
require_once "../app/controllers/public/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeaderLoca("Categorias");
require_once "../app/controllers/public/account/acceder_controller.php";
Page::templateFooter();
?>
<!--//Index-->