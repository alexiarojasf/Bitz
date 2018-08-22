<div class='container'>
    <div class='row'>
        <div class='col s12'>
        <?php
        print("
            <h3 class='header white-text'>".$producto->getNombre()."</h3>
            <div class='card horizontal'>
                <div class='card-image'>
                <img src='../web/img/productos/".$producto->getImagen()."'>
                </div>
                <div class='card-stacked'>
                    <div class='card-content'>
                        <p>".$producto->getDescripcion()."</p>
                        <p><b>Precio (US$) ".$producto->getPrecio()."</b></p>
                    </div>
        ");
        if(isset($_SESSION['id_usuario'])){
            print("
        <div class='card-action'>
            <form method='post'>
                <div class='row center'>
                    <div class='input-field col s12 m6'>
                        <i class='material-icons prefix'>list</i>
                        <input id='cantidad' type='number' name='cantidad' min='1' max=".$producto->getCantidad()." class='validate'>
                        <label for='cantidad'>Cantidad</label>
                    </div>
                    <div class='input-field col s12 m6 l12 '>
                        <button type='submit' name='agregar' class='btn waves-effect waves-light cyan tooltipped right' data-tooltip='Agregar al carrito'>Agregar al carrito</button>
                    </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>    
               
");                      
}
        else{
            print("

                <div class='row'>
                <div class='col s12 center'>
                <span class='cyan-text'>NO PUEDE AÑADIR AL CARRITO SIN INICIAR SESION</span>
                </div>
            
                </div>            
                ");
        }
        ?>
        </div>
    </div>
</div>