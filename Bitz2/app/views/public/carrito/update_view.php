<?php
//Vista para modificar la cantidad de productos en el carrito
//Se obtiene ele maximo de existencias 
       print("
<div class='container cantidad'>
	<h4  class='cyan-text center'>Actualizar cantidad del producto </h4>
<form method='post' enctype='multipart/form-data'>
   
        <div class='input-field col s12 m6'>
                  <i class='material-icons prefix'>shopping_cart</i>
          	<input id='cantidad' type='number' name='cantidad' class='validate' min='1' max=".$detalle->getExistencias()." step='any' value=".$detalle->getCantidad()." required/>
          	<label for='cantidad'>Cantidad</label>
        </div>
	<div class='row center-align'>
        <a href='carrito.php' class='btn waves-effect grey tooltipped' data-tooltip='Cancelar'><i class='material-icons'>cancel</i></a>
        <button type='submit' name='actualizar' class='btn waves-effect blue tooltipped' data-tooltip='Actualizar'><i class='material-icons'>save</i></button>
    </div>
</form>
</div>
");
?>