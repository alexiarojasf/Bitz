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