<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Proveedores");
require_once "../../app/controllers/dashboard/clientes/index_controller.php";
Page::templateFooter();
?>