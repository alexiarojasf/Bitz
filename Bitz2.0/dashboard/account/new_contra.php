<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeaderContra("Cambio obligatorio de contraseña");
require_once "../../app/controllers/dashboard/account/new_contra_controller.php";
Page::templateFooter();
?>