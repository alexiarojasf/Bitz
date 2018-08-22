<?php 
require_once("../app/models/database.class.php");
require_once("../app/helpers/validator.class.php");
require_once("../app/helpers/component.class.php");
class Page extends Component{
    public static function templateHeader($title){
        session_start();
        ini_set("date.timezone","America/El_Salvador");
        print("
        <!DOCTYPE html>
        <html lang='es'>
        <head>
        <meta charset='UTF-8'>
        <title>Bitz Lab</title>
        <link rel='shortcut icon' href='../web/images/favicon.ico' type='image/x-icon'>
        <link type='text/css' rel='stylesheet' href='../web/css/materialize.css' media='screen,projection'/>
        <link type='text/css' rel='stylesheet' href='../web/css/gradient-buttons.css'/>
        <link rel='stylesheet' href='../web/css/style.css'>
        <script type='text/javascript' src='../web/js/sweetalert.min.js'></script>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        </head>
        <body>");
        if(isset($_SESSION['id_usuario'])){
            if (isset($_SESSION['lapso'])) {
                
                $inactivo = 1200; //Segundos de actividad de pantalla.
                
                //Calculamos tiempo de vida inactivo.
                $lapsosesion = time() - $_SESSION['lapso'];
                
                //El lapso de la sesion sea mayor a el tiempo insertado en inactivo.
                if ($lapsosesion > $inactivo) {
                    //Destruimos sesión.
                    session_destroy();
                    Page::showMessage(3, "Sesión inactiva, vuelva a iniciar sesión", "../public/login.php");
                    exit();
                } else {
                    //Activamos sesion
                    $_SESSION['lapso'] = time();
                }
            }
           print("<header>
           <!--Nav-->
           <ul id='dropdown1' class='dropdown-content'>
            <li><a href='configurar_cuenta.php?id=$_SESSION[id_usuario]'>Editar Perfil</a></li>
            <li><a href='pedidos.php'>Mis pedidos</a></li>
            <li><a href='cambiar_contrasena.php'>Cambiar contraseña</a></li>
            <li class='divider'></li>
            </ul>
           <nav>
           <div class='nav-wrapper'>
               <a href='#' class='brand-logo'><img src='../web/images/logoblitz.png' height='60px' width='60px'></a>
               <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
               <ul class='right hide-on-med-and-down'>
                   <li><a href='index.php'>Inicio</a></li>
                   <li><a href='categoria.php'>Categorias</a></li>
                   <li><a href='carrito.php'>Carrito</a></li>
                   <li><a href='faq.php'>FAQ</a></li>
                   <li><a class='dropdown-button' href='#!' data-activates='dropdown1'>$_SESSION[usuario]<i class='material-icons right white-text'>arrow_drop_down</i></a></li>
                   <li><a href='logout.php'>Cerrar Sesión</a></li>
               </ul>
               <ul class='side-nav' id='mobile-demo'>
                   <div class='imgmenu'>
                       <img src='../web/images/mobilemenu.jpg' alt='>
                   </div>
                   <li><a href='Index.html'>Inicio</a></li>
                   <li><a href='pages/productos.html'>Productos</a></li>
                   <li><a href='pages/promociones.html'>Promociones</a></li>
                   <li><a href='pages/carrito.html'>Carrito</a></li>
                   <li><a href='pages/login.html'>Ingresar</a></li>
                   <li><a href='pages/faq.html'>FAQ</a></li>
               </ul>
           </div>
           </nav>
           </header>
           <main>");
        }else{
            print("
            <header>
            <!--Nav-->
            <nav>
            <div class='nav-wrapper'>
                <a href='#' class='brand-logo'><img src='../web/images/logoblitz.png' height='60px' width='60px'></a>
                <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
                <ul class='right hide-on-med-and-down'>
                    <li><a href='index.php'>Inicio</a></li>
                    <li><a href='categoria.php'>Categorias</a></li>
                    <li><a href='carrito.php'>Carrito</a></li>
                    <li><a href='login.php'>Ingresar</a></li>
                    <li><a href='faq.php'>FAQ</a></li>
                </ul>
                <ul class='side-nav' id='mobile-demo'>
                    <div class='imgmenu'>
                        <img src='../web/images/mobilemenu.jpg' alt='>
                    </div>
                    <li><a href='Index.html'>Inicio</a></li>
                    <li><a href='pages/productos.html'>Productos</a></li>
                    <li><a href='pages/promociones.html'>Promociones</a></li>
                    <li><a href='pages/carrito.html'>Carrito</a></li>
                    <li><a href='pages/login.html'>Ingresar</a></li>
                    <li><a href='pages/faq.html'>FAQ</a></li>
                </ul>
            </div>
            </nav>
            </header>
                ");
        }
    }
    public static function templateFooter(){
        print("
        </main>
        <script type='text/javascript' src='../web/js/jquery-3.3.1.min.js'></script>
        <script type='text/javascript' src='../web/js/materialize.js'></script>
        <script type='text/javascript' src='../web/js/mijs.js'></script>
        <script type='text/javascript' src='../web/js/mijs_ad.js'></script>
        <script type='text/javascript' src='../web/js/scripts.js'></script>
        <script>
        function soloLetras(e){
           key = e.keyCode || e.which;
           tecla = String.fromCharCode(key).toLowerCase();
           letras = ' áéíóúabcdefghijklmnñopqrstuvwxyz';
           especiales = '8-37-39-46';
    
           tecla_especial = false
           for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }
    
            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
        }
    </script>
    <script>
    function valida(e){
        tecla = (document.all) ? e.keyCode : e.which;
    
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }
            
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
    </script>
    <script>
    function valida2(e){
        tecla = (document.all) ? e.keyCode : e.which;
    
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }
            
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9.]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
    </script>
        <footer class='page-footer'>
<div class='container'>
	<div class='row'>
		<div class='col l6 s12'>
			<h5 class='white-text'>¡Siguenos en nuestras redes sociales!</h5>
			<ul>
				<li><a href='#!'><span><img src='../web/images/fb.png' alt=' width='40px' height='40px'></span></a><a href='#!'><span><img src='../web/images/twitter.png' alt=' width='40px' height='40px'></span></a><a href='#!'><span><img src='../web/images/inst.png' alt=' width='40px' height='40px'></span></a></li>
			</ul>
			<p class='grey-text text-lighten-4'>
				<i>'Servir las mejores hamburguesas del pais es nuestro deber'</i>
			</p>
		</div>
		<div class='col l4 offset-l2 s12'>
			<h5 class='white-text'>Contactanos</h5>
			<br>
			<ul>
				<li>Tel. 2289-9999/2299-999</li>
				<li>Correo. sunshineburgerssv@gmail.com</li>
				<br>
				<li><a class='dropdown-button btn deep-orange accent-4' href='#' data-activates='dropdown1'>Idioma</a>
				<ul id='dropdown1' class='dropdown-content'>
					<li><a href='#!'>Español</a></li>
					<li class='divider'></li>
					<li><a href='#!'>Ingles</a></li>
				</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class='footer-copyright'>
	<div class='container'>
		 © 2018 Copyright Instituo Tecnico Ricaldone <a class='grey-text text-lighten-4 right' href='#'>Volver a Top</a>
		<div class='fixed-action-btn' style='bottom: 45px; right: 24px;'>
			<a class='btn-floating btn-large red'>
			<i class='material-icons'>mode_edit</i>
			</a>
			<ul>
				<li>
				<p>
					 Usuario
				</p>
				<a href='../privado/administrador/pages/login-ad.html' class='btn-floating red button-collapse' data-activates='slide-out' style='transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;'><i class='material-icons'>account_circle</i></a>
			</li>
				<li>
				<p>
					 Dashboard
				</p>
				<a class='btn-floating yellow darken-1' style='transform: scaleY(0.4) scaleX(0.4) translateY(40px) translateX(0px); opacity: 0;'><i class='material-icons'>insert_chart</i></a></li>
			</ul>
		</div>
	</div>
</div>
</footer>");
    }
    public static function navLogin($title)
    {  
        session_start();
        print("
        <!DOCTYPE html>
        <html>
        <head>
        <meta charset='UTF-8'>
        <title>Bitz Lab</title>
        <link rel='shortcut icon' href='../web/images/favicon.ico' type='image/x-icon'>
        <link type='text/css' rel='stylesheet' href='../web/css/materialize.css' media='screen,projection'/>
        <link type='text/css' rel='stylesheet' href='../web/css/gradient-buttons.css'/>
        <link rel='stylesheet' href='../web/css/style.css'>
        <script type='text/javascript' src='../web/js/sweetalert.min.js'></script>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        </head>
        <body>
");
    }
}
?>