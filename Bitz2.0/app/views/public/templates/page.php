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
           <nav>
           <div class='nav-wrapper'>
               <a href='#' class='brand-logo'><img src='../web/images/logoblitz.png' height='60px' width='60px'></a>
               <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
               <ul class='right hide-on-med-and-down'>
                   <li><a class='dropdown-button' href='#!' data-activates='dropdown1'>$_SESSION[usuario]<i class='material-icons right white-text'>arrow_drop_down</i></a></li>
               </ul>
               <ul class='side-nav' id='mobile-demo'>
                   <div class='imgmenu'>
                       <img src='../web/images/mobilemenu.jpg' alt='>
                   </div>
                   <li><a href='pages/login.html'>Ingresar</a></li>
               </ul>
           </div>
           </nav>
           </header>
           <main>");

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
   
   
           if($hoy == $fecha_aviso1){
               print('<script>
               $(document).ready(function(){
                   toast();
               });
               function toast() {
                   var $toastContent = $("<span><h6>Pasó un mes desde tu último cambio de contraseña</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../public/cambiar_contrasena.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
                   Materialize.toast($toastContent, 6000);
               }
               </script>');
           }else if($hoy == $fecha_aviso2){
               print('<script>
               $(document).ready(function(){
                   toast();
               });
               function toast() {
                   var $toastContent = $("<span><h6>Pasaron 2 meses desde tu último cambio de contraseña</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../public/cambiar_contrasena.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
                   Materialize.toast($toastContent, 6000);
               }
               </script>');
           }else if($hoy == $fecha_aviso3){
               print('<script>
               $(document).ready(function(){
                   toast();
               });
               function toast() {
                   var $toastContent = $("<span><h6>Faltan 5 dias para que cambies tu contraseña</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../public/cambiar_contrasena.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
                   Materialize.toast($toastContent, 6000);
               }
               </script>');
           }else if($hoy == $fecha_aviso4){
               print('<script>
               $(document).ready(function(){
                   toast();
               });
               function toast() {
                   var $toastContent = $("<span><h6>Faltan 4 dias para que cambies tu contraseña</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../public/cambiar_contrasena.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
                   Materialize.toast($toastContent, 6000);
               }
               </script>');
           }else if($hoy == $fecha_aviso5){
               print('<script>
               $(document).ready(function(){
                   toast();
               });
               function toast() {
                   var $toastContent = $("<span><h6>Faltan 3 dias para que cambies tu contraseña</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../public/cambiar_contrasena.php?../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
                   Materialize.toast($toastContent, 6000);
               }
               </script>');
           }else if($hoy == $fecha_aviso6){
               print('<script>
               $(document).ready(function(){
                   toast();
               });
               function toast() {
                   var $toastContent = $("<span><h6>Faltan 2 dias para que cambies tu contraseña</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../public/cambiar_contrasena.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
                   Materialize.toast($toastContent, 6000);
               }
               </script>');
           }else if($hoy == $fecha_aviso7){
               print('<script>
               $(document).ready(function(){
                   toast();
               });
               function toast() {
                   var $toastContent = $("<span><h6>Faltan 1 dias para que cambies tu contraseña</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../public/cambiar_contrasena.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
                   Materialize.toast($toastContent, 6000);
               }
               </script>');
           }
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
        <script < src='https://www.google.com/recaptcha/api.js?hl=es' async defer></script><script>
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
    function check(e) {
        tecla = (document.all) ? e.keyCode : e.which;
    
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla == 8) {
            return true;
        }
    
        // Patron de entrada, en este caso solo acepta numeros y letras
        patron = /[A-Za-z0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
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
    public static function templateHeaderLoca(){
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