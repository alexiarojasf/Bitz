<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Agregar productos");
require_once "../../app/controllers/dashboard/productos/create_controller.php";
Page::templateFooter();
?>