<?php
require_once("../../app/models/usuario.class.php");
try{
	$object = new Usuario;
	if($object->getUsuarios()){
		if(isset($_POST['iniciar'])){
			$_POST = $object->validateForm($_POST);
			if($object->setAlias(htmlentities($_POST['alias']))){
				if($object->checkAlias()){
					if($object->setClave($_POST['clave'])){
						if($object->checkPassword()){
							$_SESSION['fecha_bloq'] = $object->getFechaBloq();
							$fecha_bloqueo = $_SESSION['fecha_bloq'];
							$hoy = date("Y-m-j h:i");
							if($hoy <= $fecha_bloqueo){
								throw new Exception("Tu cuenta sigue bloqueada 24 horas");
							}
							else{
								$object->setLogNum(0);
								$object->PassLog();
								if($object->checkPassLog()){
									$lognum = $object->getLogNum();
									if($lognum < 3){
										$_SESSION['id_usuario'] = $object->getId();
										$_SESSION['usuario'] = $object->getAlias();
										$_SESSION['correo_usu'] = $object->getCorreo();
										$_SESSION['foto_usu'] = $object->getImagen();
										$_SESSION['fecha_creacion'] = $object->getFechaHoy();
										$_SESSION['tipo_usu'] = $object->getIdTipoUsuario();
										$tipousu = $_SESSION['tipo_usu'];
										$fechaUsu = $_SESSION['fecha_creacion'];
										$fechaLimite = strtotime('+90 day', strtotime($fechaUsu));
										$fechaLimite = date ('Y-m-j',$fechaLimite);
										$hoy = date("Y-m-j");
										if ($hoy >= $fechaLimite) {
											Page::showMessage(2, "El uso de tu contraseña ha expirado", "new_contra.php");
										}
										else{
											Page::showMessage(1, "Autenticación correcta", "../dashboard/menu_ad.php");
										}
									}
									if($lognum == 3){
										throw new Exception("Tu cuenta sigue bloqueada 24 horas");
									}
								}
							}
							$_SESSION['id_usuario'] = $object->getId();
							$_SESSION['usuario'] = $object->getAlias();
							$_SESSION['correo_usu'] = $object->getCorreo();
							$_SESSION['foto_usu'] = $object->getImagen();
							$_SESSION['fecha_creacion'] = $object->getFechaHoy();
							$_SESSION['tipo_usu'] = $object->getIdTipoUsuario();
							$tipousu = $_SESSION['tipo_usu'];
							$fechaUsu = $_SESSION['fecha_creacion'];
							$fechaLimite = strtotime('+90 day', strtotime($fechaUsu));
							$fechaLimite = date ('Y-m-j',$fechaLimite);
							$hoy = date("Y-m-j");
							if ($hoy >= $fechaLimite) {
								Page::showMessage(2, "El uso de tu contraseña ha expirado", "new_contra.php");
							}
							else{
								Page::showMessage(1, "Autenticación correcta", "../dashboard/menu_ad.php");
							}
						}else{ 
							if($object->checkPassLog()){
								$lognum = $object->getLogNum();
								if($lognum<3){
									$lognum ++;
									$object->setLogNum($lognum); 
									$object->PassLog();
									if($lognum == 1){
										throw new Exception("Clave incorrecta , tienes 2 intentos más!");
									}else if($lognum == 2){
										throw new Exception("Clave incorrecta , tienes 1 intentos más!");
									}else if($lognum == 3){
										$hoy = date("Y-m-j h:i");
										$object->setFechaBloq($hoy);
										$object->updateBloq();
										throw new Exception("Clave incorrecta , Tu cuenta ha sido bloqueada 24 horas");
									}
								}else if($lognum == 3){
									$hoy = date("Y-m-j h:i");
									$object->setFechaBloq($hoy);
									$object->updateBloq();
									throw new Exception("Tu cuenta sigue bloqueada 24 horas!");
								}
							}
						}
					}else{
						throw new Exception("Clave menor a 6 caracteres");
					}
				}else{
					throw new Exception("Alias inexistente");
				}
			}else{
				throw new Exception("Alias incorrecto");
			}
		}
	}else{
		Page::showMessage(3, "No hay usuarios disponibles", "register.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/account/index_view.php");
?>