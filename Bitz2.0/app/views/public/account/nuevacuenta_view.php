<div class='white-text center'>
    <h2>Nueva Cuenta</h2>
    <br>
    <div class='row'>
        <form class='col s12 m6 offset-l3' method='post' enctype='multipart/form-data'>
            <div class='row '>
                <div class='input-field col s12'>
                    <input type='text' id='usuario' name='usuario' class='autocomplete'>
                    <label for='usuario'>Nombre de Usuario</label>
                </div>
            </div>
            <div class='input-field col s12 '>
                <input type='text' id='correo' name='correo' class='autocomplete'>
                <label for='correo'>Correo Electronico</label>
            </div>
            <div class='input-field col s12 m4'>
                <input id='password' type='password' name='clave1' class'"validate'>
                <label for='password'>Contraseña</label>
            </div>
            <div class='row'>
                <div class='input-field col s12 m4'>
                    <input id='password' type='password' name='clave2' class='validate'>
                    <label for='password'>Repite Contraseña</label>
                </div>
            </div>
            <p class='center'>Si das a "registrar automaticamente aceptas los terminos y condiciones"</p>
            <div class='row'>
                <div class='col s12'>
                    <button class='btn waves-effect waves-light red accent-4 hoverable' type='submit' name='crear'>Registrar
                        <i class='material-icons right'>directions_walk</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>