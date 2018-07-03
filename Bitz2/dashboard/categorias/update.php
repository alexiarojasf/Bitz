<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Modificar usuarios");
require_once "../../app/controllers/dashboard/categorias/update_controller.php";
Page::templateFooter();
?>