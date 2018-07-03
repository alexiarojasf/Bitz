<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Crear usuarios");
require_once "../../app/controllers/dashboard/usuarios/create_controller.php";
Page::templateFooter();
?>