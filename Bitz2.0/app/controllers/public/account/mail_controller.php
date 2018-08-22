<?php
require_once("../app/models/usuario.class.php");
require_once("../app/libraries/PHPMailer/class.phpmailer.php");
require_once("../app/libraries/PHPMailer/class.smtp.php");

function ClaveNueva($length = 8) { 
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
} 

try{
    $nueva= ClaveNueva();
	$object = new Usuario;
		if(isset($_POST['enviar'])){
            $_POST = $object->validateForm($_POST);
            if($object->setCorreo($_POST['correo'])){
			if($object->setNombres($_POST['nombre'])){
				// Se verifica la existencia del correo y que tenga un estado "Activo"
				if($object->VerificarCorreo()){
                    if($_POST['nombre']== $object->getNombres()){ 
                    $correo= $_POST['correo'];
                    $nombre= $_POST['nombre'];
                    $object->RestablecerContra($nueva);
                
                    $mail = new PHPMailer;

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'expobecas@gmail.com';
                    $mail->Password = 'Expobecas2018';
                    $mail->SMTPSecure = 'ssl'; 
                    $mail->Port = 465;
                    $mail->setFrom('expobecas@gmail.com', 'Bitz');
                    $mail->addAddress($correo, $nombre);
                    $mail->isHTML(true);
                    $mail->Subject = 'Recuperacion de clave';
                    $mail->Body = '
                    <html  lang="es">
                    <head>
                    <meta charset="utf-8">
                    <style type ="txt/css">
                    #tex{
                        color: #63666A;
                        font-size: 11px;
                    }
                    .l{
                        font-size: 13px;
                        color: #BF2B8A;
                    }        
                    </style>
                    </head>
                    <body>
                    <h1> Hola: '.$nombre.' nos has solicitado restablecer tu clave.</h1>
                    <p> Su contraseña fue cambiada por una temporal, esta es su nueva clave: <strong>'.$nueva.'</strong> </p> 
                    <p>Recuerda cambiar tu contraseña cuando accedas a tu cuenta, colocando la contraseña temporal <br>
                    en los campos de contraseña actual.</p> <p id="tex"> Si no haz solicitado recuperar 
                    tu contraseña solo ignora este mensaje </p> <br> <p> <strong> Te saluda cordialmente, </strong> </p> <p> BitzLab. </p>
                    ';
                     

                    if(!$mail->send()){
                        throw new Exception("No se pudo". $mail->ErrorInfo);
                    }
                    else{
                        Page::showMessage(1, "Correo enviado", "../public/login.php");
                    }
						}
							
							else{
								throw new Exception("Los datos no coinciden con los registrados anteriormente");
							}
						}else{
							throw new Exception("Correo inexistente");
						}
					}else{
						throw new Exception("Nombre no válido");
                    }
                }
                else{
                    throw new Exception("Correo no válido");
                }
			
                }
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../app/views/public/account/recuperar_view.php");
?>





