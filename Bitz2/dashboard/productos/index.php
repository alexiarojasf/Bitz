<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Productos");
require_once "../../app/controllers/dashboard/productos/index_controller.php";
Page::templateFooter();
?>