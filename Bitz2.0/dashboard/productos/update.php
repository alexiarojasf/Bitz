<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Productos");
require_once "../../app/controllers/dashboard/productos/update_controller.php";
Page::templateFooter();
?>