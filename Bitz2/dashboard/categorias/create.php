<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Categorias");
require_once "../../app/controllers/dashboard/categorias/create_controller.php";
Page::templateFooter();
?>