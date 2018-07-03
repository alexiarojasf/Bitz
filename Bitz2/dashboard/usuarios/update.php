<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Actualizar usuario");
require_once "../../app/controllers/dashboard/usuarios/update_controller.php";
Page::templateFooter();
?>