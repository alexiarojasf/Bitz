<!--Index//-->
<?php
require_once "../app/controllers/public/controller_index.php";
$mvc = new mvcController();
$mvc -> plantilla();
Page::templateHeader("Categorias");
require_once "../app/views/public/faq/faq_view.php";
Page::templateFooter();
?>
<!--//Index-->