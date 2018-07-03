<div class="container">
<?php
$categoria = $productos[0]['nombre_tipo_prod'];
print("<h4 class='center brown-text'>$categoria</h4>");
print("<div class='row'>");
foreach($productos as $producto){
    print("
        <div class='col s12 m6 l4'>
            <div class='card hoverable'>
            <div class='card-image'>
                <img src='../web/img/productos/$producto[foto_prod]' class='materialboxed'>
                <a href='detalle_producto.php?id=$producto[id_producto]' class='btn-floating halfway-fab waves-effect waves-light red tooltipped' data-tooltip='Ver detalles'><i class='material-icons'>add</i></a>
            </div>
            <div class='card-content'>
                <span class='card-title'>$producto[nombre_prod]</span>
                <p>Precio (US$) $producto[precio_prod]</p>
            </div>
            </div>
        </div>
    ");
}
?>
    </div>