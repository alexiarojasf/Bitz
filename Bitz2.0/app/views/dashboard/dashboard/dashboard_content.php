  <div class="row">
    <div class="col s12 m12 offset-l3 l9">
      <div class="card ">
        <div class="card-content">
          <span class="card-title">Resumen de la semana</span>
          <div class="divider"></div>
          <div class="row">
            <div class="col s12 m6 l6">
              <h5>La cantidad de ventas realizadas esta semana</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur laboriosam necessitatibus nulla, ipsum
                quo perspiciatis deleniti alias libero quos quae aspernatur tempora sequi ea non fuga vero, culpa, excepturi
                adipisci.
              </p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur laboriosam necessitatibus nulla, ipsum
                quo perspiciatis deleniti alias libero quos quae aspernatur tempora sequi ea non fuga vero, culpa, excepturi
                adipisci.
              </p>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur laboriosam necessitatibus nulla, ipsum
                quo perspiciatis deleniti alias libero quos quae aspernatur tempora sequi ea non fuga vero, culpa, excepturi
                adipisci.
              </p>
            </div>
            <div class="col s12 m6 l6">
              <canvas id="myChart" width="400" height="400"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <span class="card-title pad-top-conv">Lo mas vendido</span>
          <div class="divider"></div>
          <div class="row">
            <div class="row">
              <div class="col s12">
                <ul class="tabs">
                  <li class="tab col s3">
                    <a class="active" href="#test1">Monitores</a>
                  </li>
                  <li class="tab col s3">
                    <a href="#test2">GPU's</a>
                  </li>
                  <li class="tab col s3">
                    <a href="#test3">Accesorios</a>
                  </li>
                </ul>
              </div>
              <div id="test1" class="col s12">

                  <?php
                  foreach($data as $row){
                      print("

                      <div class='col s12 m4 l4'>
                  <div class='card'>
                    <div class='card-image waves-effect waves-block waves-light'>
                      <img class='activator' src='../../web/images/productos/$row[foto_prod]'>
                    </div>
                    <div class='card-content'>
                      <span class='card-title activator grey-text text-darken-4'>$row[nombre_prod]
                        <i class='material-icons right'>more_vert</i>
                      </span>
                      <p>
                        <h5 class='red-text'>$$row[precio_prod]</h5>
                      </p>
                    </div>
                    <div class='card-reveal'>
                      <span class='card-title grey-text text-darken-4'>$row[nombre_prod]
                        <i class='material-icons right'>close</i>
                      </span>
                      <p>$row[descripcion_prod]</p>
                    </div>
                  </div>
                </div>
                      ");
                  }
                  ?>
              </div>
              <div id="test2" class="col s12">
                <div class="col s12 m4 l4">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="../../web/images/productos/gpu1.jpg">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Monitor Asus XRT-800
                        <i class="material-icons right">more_vert</i>
                      </span>
                      <p>
                        <a href="#">This is a link</a>
                      </p>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Card Title
                        <i class="material-icons right">close</i>
                      </span>
                      <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4 l4">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="../../web/images/productos/gpu2.jpg">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Monitor Asus XRT-750
                        <i class="material-icons right">more_vert</i>
                      </span>
                      <p>
                        <a href="#">This is a link</a>
                      </p>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Card Title
                        <i class="material-icons right">close</i>
                      </span>
                      <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                  </div>
                </div>
                <div class="col s12 m4 l4">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="../../web/images/productos/gpu3.jpg">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Monitor PRAIXA ART-550
                        <i class="material-icons right">more_vert</i>
                      </span>
                      <p>
                        <a href="#">This is a link</a>
                      </p>
                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4">Card Title
                        <i class="material-icons right">close</i>
                      </span>
                      <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div id="test3" class="col s12">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  $hoy = date('Y-m-j');
  $a = "'";
  $fechaUsu = "$_SESSION[fecha_creacion]";
  $fecha_aviso1 = strtotime('+30 day', strtotime($fechaUsu));
  $fecha_aviso1 = date ('Y-m-j',$fecha_aviso1);
  $fecha_aviso2 = strtotime('+60 day', strtotime($fechaUsu));
  $fecha_aviso2 = date ('Y-m-j',$fecha_aviso2);
  $fecha_aviso3 = strtotime('+86 day', strtotime($fechaUsu));
  $fecha_aviso3 = date ('Y-m-j',$fecha_aviso3);
  $fecha_aviso4 = strtotime('+87 day', strtotime($fechaUsu));
  $fecha_aviso4 = date ('Y-m-j',$fecha_aviso4);
  $fecha_aviso5 = strtotime('+88 day', strtotime($fechaUsu));
  $fecha_aviso5 = date ('Y-m-j',$fecha_aviso5);
  $fecha_aviso6 = strtotime('+89 day', strtotime($fechaUsu));
  $fecha_aviso6 = date ('Y-m-j',$fecha_aviso6);
  $fecha_aviso7 = strtotime('+90 day', strtotime($fechaUsu));
  $fecha_aviso7 = date ('Y-m-j',$fecha_aviso7);
  $fecha_aviso8 = strtotime('+91 day', strtotime($fechaUsu));
  $fecha_aviso8 = date ('Y-m-j',$fecha_aviso8);


  if($hoy >= $fecha_aviso1 && $hoy < $fecha_aviso2){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Pasó un mes desde tu último cambio de contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy >= $fecha_aviso2 && $hoy < $fecha_aviso3){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Pasaron 2 meses desde tu último cambio de contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso3){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Faltan 5 dias para que cambies tu contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso4){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Faltan 4 dias para que cambies tu contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso5){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Faltan 3 dias para que cambies tu contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso6){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Faltan 2 dias para que cambies tu contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso7){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Faltan 1 dias para que cambies tu contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso8){
    print('<script>
    $(document).ready(function(){
        toast();
    });
    function toast() {
        var $toastContent = $("<span><h6>¡Tendras que cambiar tu contraseña ya mismo! O tu proximo inicio de sesion no sera permitido.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
        Materialize.toast($toastContent, 6000);
    }
    </script>');
}
  ?>