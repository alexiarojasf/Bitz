<main>
    <div class="row">
        <div class="col s12 m12 offset-l3 l9">
            <div class="card ">
                <div class="card-content">
                    <span class="card-title pad-top-conv">Actualizando usuario</span>
                    <div class="divider"></div>
                    <div class="row">
                        <form method="POST" class="col s12 m12 l12">
                            <div class="row">
                                <div class="input-field col s12 m6 l6">
                                    <input id="usuario" type="text" class="validate" name="usuario" value="<?php print($usuario->getAlias());?>">
                                    <label for="usuario">Usuario</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="nombre" type="text" class="validate" name="nombre" onkeypress="return soloLetras(event)" value="<?php print($usuario->getNombres());?>">
                                    <label for="nombre">Nombres</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="apellido" type="text" class="validate" name="apellido" onkeypress="return soloLetras(event)" value="<?php print($usuario->getApellidos());?>">
                                    <label for="apellido">Apellidos</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="telefono" type="text" class="validate" name="telefono" data-length="8" maxlength="8" onkeypress="return valida(event)" value="<?php print($usuario->getTelefono());?>">
                                    <label for="telefono">Teléfono</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="contra1" type="password" class="validate" name="clave1">
                                    <label for="contra1">Contraseña</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="contra2" type="password" class="validate" name="clave2">
                                    <label for="contra2">Repite contraseña</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="correo" type="email" class="validate" name="correo" value="<?php print($usuario->getCorreo());?>">
                                    <label for="correo">Correo</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="direccion" type="text" class="validate" name="direccion" value="<?php print($usuario->getDireccion());?>">
                                    <label for="direccion">Dirección</label>
                                </div>
                                <div class='input-field col s12 m6 l6'>
                                    <?php
                                        Page::showSelect("Tipo de usuario", "tipousu", $usuario->getIdTipoUsuario(), $usuario->getTipoUsuario());
                                        
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

</main>