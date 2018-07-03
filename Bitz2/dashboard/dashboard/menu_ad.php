<?php
require_once "../../app/controllers/dashboard/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Dashboard - Vista general");
require_once "../../app/controllers/dashboard/dashboard/index_controller.php";
Page::templateFooter();
?>