 <div class="row">
        <div class="col s12 m12 l9 center">
            <div class="card col offset-m3 m11">
                <div class="card-content">
                    <span class="card-title pad-top-conv ">Actualizando mi información</span>
                    <div class="divider"></div>
                    <div class="row">
                        <form method="POST" class="col s12 m12 l12" autocomplete="off">
                            <div class="row">
                                <div class="input-field col s12 m5 l5">
                                    <input id="usuario" type="text" class="validate" name="usuario" oncopy="return false" onpaste="return false" onkeypress="return check(event)" value="<?php print($usuario->getAlias());?>">
                                    <label for="usuario">Usuario</label>
                                </div>
                                <div class="input-field col s12 m6 l5">
                                    <input id="nombre" type="text" class="validate" name="nombre" onkeypress="return soloLetras(event)"  oncopy="return false" onpaste="return false" value="<?php print($usuario->getNombres());?>">
                                    <label for="nombre">Nombres</label>
                                </div>
                                <div class="input-field col s12 m6 l5">
                                    <input id="apellido" type="text" class="validate" name="apellido" onkeypress="return soloLetras(event)"  oncopy="return false" onpaste="return false" value="<?php print($usuario->getApellidos());?>">
                                    <label for="apellido">Apellidos</label>
                                </div>
                                <div class="input-field col s12 m6 l5">
                                    <input id="telefono" type="text" class="validate" name="telefono" data-length="8" maxlength="8" onkeypress="return valida(event)"  oncopy="return false" onpaste="return false" value="<?php print($usuario->getTelefono());?>">
                                    <label for="telefono">Teléfono</label>
                                </div>
                                <div class="input-field col s12 m6 l5">
                                    <input id="correo" type="email" class="validate" name="correo"  oncopy="return false" onpaste="return false"  oncopy="return false" onpaste="return false" value="<?php print($usuario->getCorreo());?>">
                                    <label for="correo">Correo</label>
                                </div>
                                <div class="input-field col s12 m6 l5">
                                    <input id="direccion" type="text" class="validate" name="direccion"  oncopy="return false" onpaste="return false" value="<?php print($usuario->getDireccion());?>">
                                    <label for="direccion">Dirección</label>
                                </div>
                            </div>
                            <div class="input-field col s12 m6 l11">
                                <button id="button-margin" class="btn waves-effect waves-light but-rounded but-st-blue-moon " type="submit" name="actualizar">Modificar
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
