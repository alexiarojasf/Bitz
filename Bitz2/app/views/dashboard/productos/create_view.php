<main>
    <div class="row">
        <div class="col s12 m12 offset-l3 l9">
            <div class="card ">
                <div class="card-content">
                    <span class="card-title pad-top-conv">Agregando Producto</span>
                    <div class="divider"></div>
                    <div class="row">
                        <form method="POST" class="col s12 m12 l12">
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <input id="usuario" type="text" class="validate" name="nombre">
                                    <label for="usuario">Nuevo Producto</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="nombre" type="text" class="validate" name="descripcion" onkeypress="return soloLetras(event)">
                                    <label for="nombre">Descripcion</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="apellido" type="text" class="validate" name="cantidad" onkeypress="return valida(event)">
                                    <label for="apellido">Cantidad</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="telefono" type="text" class="validate" name="precio" onkeypress="return valida2(event)">
                                    <label for="telefono">Precio</label>
                                </div>
                                <div class='input-field col s12 m6 l6'>
                                    <?php
                                        Page::showSelect("Categoria", "categoria", $producto->getCategoria(), $producto->getCategorias());
                                        
                                        ?>
                                </div>
                                <div class='input-field col s12 m6 l6'>
                                    <?php
                                        Page::showSelect("Proveedores", "proveedor", $producto->getProveedor(), $producto->getProveedores());
                                        
                                        ?>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="contra1" type="text" class="validate" name="modelo">
                                    <label for="contra1">Modelo</label>
                                </div>
                                <div class='input-field col s12 m6 l6'>
                                    <?php
                                        Page::showSelect("Estado", "estado", $producto->getEstado(), $producto->getEstados());
                                        
                                        ?>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <div class="file-field input-field">
                                        <div class="btn but-st-blue-moon but-rounded">
                                            <span>Foto</span>
                                            <input type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate " type="text" name="foto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s12 m6 l6 ">
                                <button id="button-margin" class="btn waves-effect waves-light but-rounded but-st-blue-moon " type="submit" name="crear">Agregar
                                    <span>
                                        <i class="material-icons white-text right">check</i>
                                    </span>
                                </button>
                                <a id="button-margin" class="waves-effect waves-light btn but-rounded but-st-blue-moon" href="index.php">
                                    <i class="material-icons right white-text">clear</i>Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>