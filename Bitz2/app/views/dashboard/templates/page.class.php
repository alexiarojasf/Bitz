<?php
require_once("../../app/models/database.class.php");
require_once("../../app/helpers/validator.class.php");
require_once("../../app/helpers/component.class.php");
class Page extends Component{
	public static function templateHeader($title){
		session_start();
		ini_set("date.timezone","America/El_Salvador");
		print("
			
        <!DOCTYPE html>
        <html>
        <head>

        
        <link rel='shortcut icon' href='../../web/images/favicon.ico' type='image/x-icon'>
        
        <link type='text/css' rel='stylesheet' href='../../web/css/materialize.css' media='screen,projection'/>
        
        <link type='text/css' rel='stylesheet' href='../../web/css/gradient-buttons.css'/>
                
        <link rel='stylesheet' href='../../web/css/style.css'>

        <link rel='stylesheet' type='text/css' href='../../web/css/datatables.min.css'>
        
        <script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        <title>$title</title>
        </head>
        <body background='img/cover_datos.png' alt='fondo' id='cover_datos'>");

        if(isset($_SESSION['id_usuario'])){
            print("<header>
            <div class='navbar-fixed'>
                    <nav>
                      <div class='nav-wrapper'>
                        <a href='#!' class='brand-logo center'>$title</a>
                        <a href='#' data-activates='slide-out' class='button-collapse'><i class='material-icons white-text'>format_list_bulleted</i></a>
                        <ul class='right hide-on-med-and-down'>
                        </ul>
                      </div>
                    </nav>
                  </div>
                  
        <ul id='slide-out' class='side-nav fixed indigo darken-4'>
            <li><div class='user-view'>
               <div class='background'>
               <img src='../../web/images/azulito.jpg'>
               </div>
              <a href='#!user'><img class='circle ' src='../../web/images/$_SESSION[foto_usu]'></a>
              <a href='#!name'><span class='white-text name '>$_SESSION[usuario]</span></a><a href='../usuarios/update.php?id=$_SESSION[id_usuario]' class='white-text'>Editar perfil</a>
              <a href='#!email'><span class='white-text email '>$_SESSION[correo_usu]</span></a>
            </div></li>
            <li><a href='../dashboard/menu_ad.php' class='white-text'><i class='material-icons right white-text'>home</i>Dashboard</a></li>
            <li><a href='../usuarios/index.php' class='white-text'><i class='material-icons right white-text'>account_circle</i>Usuarios</a></li>
            <li><a href='../productos/index.php' class='white-text'><i class='material-icons right white-text'>important_devices</i>Productos</a></li>
            <li><a href='../categorias/index.php' class='white-text'><i class='material-icons right white-text'>clear_all</i>Categorias</a></li>
            <li><a href='../clientes/index.php' class='white-text'><i class='material-icons right white-text'>recent_actors</i>Proveedores  </a></li>
            <li><a href='../account/logout.php' class='white-text'><i class='material-icons right white-text'>exit_to_app</i>Cerrar sesión</a></li>
          </ul>
            </header>
            <main>
            ");
        }else{
            print("
				<header class='navbar-fixed'>
                <nav>
                <div class='nav-wrapper'>
                  <a href='#!' class='brand-logo center'>$title</a>
                  <a href='#' data-activates='slide-out' class='button-collapse'><i class='material-icons white-text'>menu</i></a>
                  <ul class='right hide-on-med-and-down'>
                  </ul>
                </div>
              </nav>
				</header>
				<main class='container'>
			");
			$filename = basename($_SERVER['PHP_SELF']);
			if($filename != "index.php" && $filename != "register.php"){
				self::showMessage(3, "¡Debe iniciar sesión!", "../account/index.php");
				self::templateFooter();
				exit;
			}
        }
     }
	

	public static function templateFooter(){
        print("
        </main>
        <script type='text/javascript' src='../../web/js/jquery-3.3.1.min.js'></script>
        <script type='text/javascript' src='../../web/js/chart.js'></script>
        <script type='text/javascript' charset='utf8' src='../../web/js/datatables.min.js'></script>
        <script src='../../web/js/datatables.min.js'></script>
        <script type='text/javascript' src='../../web/js/materialize.js'></script>
        <script type='text/javascript' src='../../web/js/mijs.js'></script>
        <script type='text/javascript' src='../../web/js/mijs_ad.js'></script>
        <script>
        $(document).ready(function() {
            window.setTimeout(function(){
                $('#tablaScroll').DataTable({
                    'scrollY':        '500px',
                    'scrollCollapse': true,
                    'paging':         true,
                    'searching': false,
                    'info': false

                } );
            }, 200);
        } );
        </script>
        
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
        <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
                datasets: [{
                    label: '# of Votes',
                    data: [8, 5, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>
        
        </body>
        </html>
		");
    }
            
    public static function navLogin($title)
    {  
        session_start();
        print("
        <!DOCTYPE html>
        <html>
        <head>
        <link rel='shortcut icon' href='../../web/images/favicon.ico' type='image/x-icon'>

        <link type='text/css' rel='stylesheet' href='../../web/css/materialize.css' media='screen,projection'/>

        <link type='text/css' rel='stylesheet' href='../../web/css/gradient-buttons.css'/>

        <link type='text/css' rel='stylesheet' href='../../web/css/estilo_al_ad2.css'>

        <link rel='stylesheet' href='../../web/css/style.css'>
        
        <script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>

        <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
        <title>$title</title>
        </head>
        <body background='img/cover_datos.png' alt='fondo' id='cover_datos'>
        <header>
");
    }
}
?>