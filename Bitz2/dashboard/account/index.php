<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Inicio de sesión");
require_once "../../app/controllers/dashboard/account/login_controller.php";
Page::templateFooter();
?>