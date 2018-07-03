<main>
    <div class="row">
        <div class="col s12 m12 offset-l3 l9">
            <div class="card ">
                <div class="card-content">
                    <span class="card-title pad-top-conv">Modificando categorias</span>
                    <div class="divider"></div>
                    <div class="row">
                        <form method="POST" class="col s12 m12 l12">
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <input name="nombre" id="first_name" type="text" class="validate" value="<?php print($categoria->getNombre()); ?>" required>
                                    <label for="first_name">Categoria</label>
                                </div>

                                <div class="col s12 m6 l6">
                                    <button id="button-margin" class="btn waves-effect waves-light but-blue-green" type="submit" name="actualizar">Modificar
                                        <i class="material-icons white-text right">check</i>
                                    </button>
                                    <a  id= "button-margin" class="waves-effect waves-light btn but-blue-green" href="index.php"><i class="material-icons right white-text">clear</i>Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>