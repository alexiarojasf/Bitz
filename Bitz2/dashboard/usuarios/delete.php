<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Eliminar usuarios");
require_once "../../app/controllers/dashboard/usuarios/delete_controller.php";
Page::templateFooter();
?>