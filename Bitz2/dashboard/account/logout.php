<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::navLogin("Cerrar sesión");
require_once "../../app/controllers/dashboard/account/logout_controller.php";
Page::templateFooter();
?>