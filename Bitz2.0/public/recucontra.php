<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sunshine Burger's // Log-In</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/materialize.css">
</head>
<body>
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
              </ul>
              <ul class="side-nav" id="mobile-demo">
                <div class="imgmenu"><img src="../images/mobilemenu.jpg" alt=""></div>  
                <li><a href="Index.html">Inicio</a></li>
                <li><a href="productos.html">Productos</a></li>
                <li><a href="promociones.html">Promociones</a></li>
                <li><a href="carrito.html">Orden</a></li>
              </ul>
            </div>
          </nav>
    </header>
    <main> 
        <div class="minus-carrousel">
            <div class="carousel carousel-slider">
                <a class="carousel-item" href="#one!"><img src="../images/Carousel/1.jpg"></a>
                <a class="carousel-item" href="#two!"><img src="../images/Carousel/2.jpg"></a>
                <a class="carousel-item" href="#three!"><img src="../images/Carousel/3.jpg"></a>
                <a class="carousel-item" href="#four!"><img src="../images/Carousel/4.jpg"></a>
          </div>
        </div>
        <div class="txtLog">
            <h2>Recuperacion de Contraseña</h2>
            <br>
            <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
      <input placeholder="Ej. Ernesto Lopez" type="text" id="autocomplete-input" class="autocomplete">
      <label for="autocomplete-input">Nombre de Usuario</label>
        </div>
      </div>
      <div class="input-field col s12">
            <input placeholder="Ej. example@gmail.com" type="text" id="autocomplete-input" class="autocomplete">
            <label for="autocomplete-input">Correo Electronico</label>
              </div>
            </div>
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="Ej. 123" id="password" type="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
      </div>
      <div class="row">
            <div class="input-field col s12">
              <input placeholder="Ej. 123" id="password" type="password" class="validate">
              <label for="password">Repite Contraseña</label>
            </div>
          </div>
      <div class="row">
        <div class="col s12">
             <button class="btn waves-effect waves-light red accent-4 hoverable" type="submit" name="action">Recuperar Contraseña
    <i class="material-icons right">directions_walk</i>
  </button>
        </div>
        </div>
        <div class="row">
                <div class="col s12">
                     <p>Se enviara a tu correo la comfimacion del cambio de Contraseña</p>
                </div>
                </div>
    </form>
  </div>
        </div>

    </main>
  <!--Scripts-->
  <script src= "../js/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src= "../js/materialize.js" type="text/javascript"></script>
  <script src="../js/scripts.js" type="text/javascript"></script>
</body>
</html>