<!DOCTYPE html>
<html>
  <head>
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
     <!--Mi CSS-->
     <link type="text/css" rel="stylesheet" href="../css/estilo_al.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Carrito</title>
  </head>

  <body>
      <!--Menú-->
      <header>
          <nav>
              <div class="nav-wrapper">
                <a href="#" class="brand-logo"><img src="../images/logoblitz.png" height="60px" width="60px"></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                  <li><a href="../Index.html">Inicio</a></li>
                  <li><a href="productos.html">Productos</a></li>
                  <li><a href="promociones.html">Promociones</a></li>
                  <li><a href="carrito.html">Orden</a></li>
                  <li><a href="../Index.html">Cerrar Sesion</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                  <div class="imgmenu"><img src="../images/mobilemenu.jpg" alt=""></div>  
                  <li><a href="Index.html">Inicio</a></li>
                  <li><a href="productos.html">Productos</a></li>
                  <li><a href="promociones.html">Promociones</a></li>
                  <li><a href="carrito.html">Orden</a></li>
                  <li><a href="../Index.html">Cerrar Sesion</a></li>
                </ul>
              </div>
            </nav>
        </header>
         <!--Contenido-->
         <main>
            <img class="responsive-img"  src="../images/fondo_carrito.png" alt="fondo" id="fondo_c">
            <h1 id="titulo_c">Empleados</h1>
         <!--Tabla-->
         <div class="container">
                <form class="col s12">
                        <div class="row">
                          <div class="input-field col s12">
                        <input placeholder="Ej. Ernesto Lopez" type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Buscar Empleado</label>
                          </div>
                        </div>
                        </form>
         <div class="row">
           <div class="col s12 m8 l6">
            <table class="bordered hoverable responsive-table tabla">
                <thead>
                  <tr>
                      <th>Apellidos</th>
                      <th>Nombres</th>
                      <th>DUI</th>
                      <th>NIT</th>
                      <th>Direccion</th>
                      <th>Telefono</th>
                      <th>Movil</th>
                      <th>Cargo</th>
                  </tr>
                </thead>
         <!--Columnas-->
                <tbody>
                  <tr>
                    <td>Moran Marroquin</td>
                    <td>Javier Andre</td>
                    <td>2356150-9</td>
                    <td>2356150-9</td>
                    <td>San Antonio Abad</td>
                    <td>2258-9887</td>
                    <td>7088-5223</td>
                    <td>Adminstrador</td>
                  </tr>
                  <tr>
                    <td>Rojas Figueroa</td>
                    <td>Alexia Beatriz</td>
                    <td>2874150-9</td>
                    <td>5698540-9</td>
                    <td>San Salvador</td>
                    <td>2588-9811</td>
                    <td>7784-5983</td>
                    <td>Adminstrador</td>
                  </tr>
                </tbody>
              </table> 
         <!--Resumen-->
    </div>

    
        </main>

        <footer class="page-footer">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">¡Siguenos en nuestras redes sociales!</h5>
                  <ul>
                    <li><a  href="#!"><span><img src="../images/fb.png" alt="" width="40px" height="40px"></span> </a><a  href="#!"><span><img src="../images/twitter.png" alt="" width="40px" height="40px"></span> </a><a  href="#!"><span><img src="../images/inst.png" alt="" width="40px" height="40px"></span> </a></li>
                  </ul>
                  <p class="grey-text text-lighten-4"><i>"Servir las mejores hamburguesas del pais es nuestro deber"</i></p>
                </div>
                <div class="col l4 offset-l2 s12">
                  <h5 class="white-text">Contactanos</h5>
                  <br>
                  <ul>
                    <li>Tel. 2289-9999/2299-999</li>
                    <li>Correo. sunshineburgerssv@gmail.com</li>
                    <br>
                    <li><a class='dropdown-button btn deep-orange accent-4' href='#' data-activates='dropdown1'>Idioma</a>
                    <ul id='dropdown1' class='dropdown-content'>
                    <li><a href="#!">Español</a></li>
                    <li class="divider"></li>
                    <li><a href="#!">Ingles</a></li>
                    </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>  
            <div class="footer-copyright">
              <div class="container">
              © 2018 Copyright Instituo Tecnico Ricaldone 
              <a class="grey-text text-lighten-4 right" href="#">Volver a Top</a>
            </div>
            </div>
          </footer>


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>
    <script type="text/javascript" src="../js/mijs.js"></script>
  </body>
</html>
      