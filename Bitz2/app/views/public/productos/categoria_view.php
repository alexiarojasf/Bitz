<h3 class='white-text center'>PRODUCTOS</h3>
<div class='row'>
<?php
foreach($categorias as $categoria){
    print("
        <div class='col s12 m6 l4'>
            <div class='card hoverable'>
                <div class='card-content personal-color2'>
                    <span class='card-title activator white-text'>$categoria[nombre_tipo_prod]</span>
                    <a href='productos.php?id=$categoria[id_tipo_producto]' class='tooltipped waves-effect waves-light btn' data-tooltip='Ver más'>
                    Ver mas</a>
                </div> 
            </div>
        </div>
    ");
}
?>
</div>
