<!--Index//-->
<?php
require_once "../app/controllers/public/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Cambiar contraseña");
require_once "../app/controllers/public/account/cambiar_contrasena.php";
Page::templateFooter();
?>
<!--//Index-->