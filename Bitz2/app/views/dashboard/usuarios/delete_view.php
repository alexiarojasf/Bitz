<main>
    <div class="row">
        <div class="col s12 m12 offset-l3 l9">
            <div class="card ">
                <div class="card-content">
                    <span class="card-title pad-top-conv">Eliminando usuario</span>
                    <div class="divider"></div>
                    <div class="row">
                    <form method='post'>
                    <div class='row center-align'>
                        <h4>El usuario <?php print($usuario->getAlias()); ?> será borrado ¿Está seguro?</h4>
                        <a href='index.php' class='btn waves-effect grey tooltipped' data-tooltip='Cancelar'><i class='material-icons'>cancel</i></a>
                        <button type='submit' name='eliminar' class='btn waves-effect red tooltipped' data-tooltip='Eliminar'><i class='material-icons'>remove_circle</i></button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>