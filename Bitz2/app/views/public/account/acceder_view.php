<div class="row">
    <div class="carousel carousel-slider col m6 right">
        <a class="carousel-item" href="#one!"><img src="../web/images/Carousel/1.jpg"></a>
        <a class="carousel-item" href="#two!"><img src="../web/images/Carousel/2.jpg"></a>
        <a class="carousel-item" href="#three!"><img src="../web/images/Carousel/3.jpg"></a>
        <a class="carousel-item" href="#four!"><img src="../web/images/Carousel/4.jpg"></a>
    </div>
    <div class="txtLog">
        <h2>Inicio de sesión</h2>
        <br>
        <div class="row">
            <form class="col s12" method='post'>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Ej. Ernesto Lopez" type="text" id="alias" name="alias" class="validate" value='<?php print($object->getAlias()) ?>' required/>
                        <label for="alias">Usuario</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Ej. 123" id="clave" name='clave' type="password" class="validate" value='<?php print($object->getClave()) ?>' required/>
                        <label for="clave">Contraseña</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button type='submit' name='iniciar' class='btn waves-effect'><i class='material-icons white-text right'>send</i>Iniciar</button>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <a href="nuevacuenta.php">Registrar nueva cuenta</a>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <a href="recucontra.html">Ha olvidado su Contraseña?</a>
                            </div>
                        </div>
            </form>
            </div>
            </div>