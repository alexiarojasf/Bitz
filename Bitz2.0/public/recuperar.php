<!--Index//-->
<?php
require_once "../app/controllers/public/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Cambiar contraseña");
require_once "../app/controllers/public/account/mail_controller.php";
Page::templateFooter();
?>
<!--//Index-->