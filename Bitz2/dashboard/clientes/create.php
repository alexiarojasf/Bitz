<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Proveedores");
require_once "../../app/controllers/dashboard/clientes/create_controller.php";
Page::templateFooter();
?>