<?php
require_once "../app/controllers/public/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::navLogin("Cerrar sesión");
require_once "../app/controllers/public/account/logout_controller.php";
Page::templateFooter();
?>