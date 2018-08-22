<main>

<div class="row">
    <div class="col s12 offset-m3 m6 s4">
      <div class="card but-st-blue-lagoon">
        <div class="card-content white-text">
          <span class="card-title center">Nueva contraseña</span>
          <form method='post'>
			<div class='row'>
				<div class='input-field col s12 m6 offset-m3'>
					<i class='material-icons prefix white-text'>person_pin</i>
					<input id='alias' type='text' autocomplete = 'off' name='alias' class='validate' value='<?php print($object->getAlias()); ?>' required/>
					<label for='alias'>Usuario</label>
				</div>
				<div class='input-field col s12 m6 offset-m3'>
					<i class='material-icons prefix white-text'>security</i>
					<input id='claveAntigua' type='password' name='claveAntigua' class='validate' required/>
					<label for='claveAntigua'>Contraseña anterior</label>
				</div>
				<div class='input-field col s12 m6 offset-m3'>
					<i class='material-icons prefix white-text'>security</i>
					<input id='clave' type='password' name='clave' class="validate"  required/>
					<label for='clave'>Nueva contraseña</label>
				</div>
			</div>
			
			<div class='row center-align'>
				<button type='submit' name='actualizar' class='btn waves-effect'><i class='material-icons white-text right'>send</i>Actualizar contraseña</button>
			</div>
		</form>
        </div>
      </div>
    </div>
  </div>
</main>