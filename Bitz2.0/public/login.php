<!--Index//-->
<?php
require_once "../app/controllers/public/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Iniciar Sesión");
require_once "../app/controllers/public/account/acceder_controller.php";
Page::templateFooter();
?>
<!--//Index-->