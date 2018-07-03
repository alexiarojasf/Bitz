<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Usuarios");
require_once "../../app/controllers/dashboard/usuarios/index_controller.php";
Page::templateFooter();
?>