<?php
require_once ("../app/models/cliente.class.php");
require_once ("../app/libraries/recaptcha-1.0.0/php/recaptchalib.php");
try {
	$usuario = new Usuario;
	if (isset($_POST['crear'])) {
		$_POST = $usuario->validateForm($_POST);
		if ($usuario->setAlias(htmlentities($_POST['usuario']))) {
			$usuarioexistente->getUsuarioExistente();
			if (!$usuarioexistente) {
				if ($usuario->setCorreo(htmlentities($_POST['correo']))) {
					$correolibre = $usuario->CorreoExistente();
					if (!$correolibre) {
						$contra = $_POST['clave1'];
						if ($_POST['clave1'] == $_POST['clave2']) {
							if ($_POST['clave1'] != $_POST['correo']) {
								if ($_POST['clave2'] != $_POST['correo']) {
									if ($_POST['clave1'] != $_POST['usuario']) {
										if ($_POST['clave2'] != $_POST['correo']) {
											 //STRLEN -> LEE LA LONGITUD DE UN STRING
											if (strlen($contra) >= 8) {
												// PREG_MATCH <- HACE UNA COMPARACIÓN
												if (preg_match('`[a-z]`', $contra)) {
													if (preg_match('`[A-Z]`', $contra)) {
														if (preg_match('`[0-9]`', $contra)) {
															$especiales = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
															if (preg_match($especiales, $contra)) {
																if ($usuario->setClave(htmlentities($_POST['clave1']))) {
																	$response_recaptcha = $_POST['g-recaptcha-response'];
																	if (isset($response_recaptcha) && $response_recaptcha) {
																		$secret = "6LdE7WsUAAAAAPMBlXANwFIK4CWyeg_kW2i-zWD7"; //CLAVE SECRETA QUE DA EL SITIO DE CAPTCHA
																		$ip = $_SERVER['REMOTE_ADDR'];
																		$validation_server = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response_recaptcha&remoteip=$ip");
																		if ($validation_server != null) {
																			if ($usuario->createUsuario()) {
																				Page::showMessage(1, "Usuario creado, llena tus datos personales al iniciar sesion", "index.php");
																			}
																			else {
																				throw new Exception(Database::getException());
																				Page::showMessage(1, "Fallo");
																			}
																		}
																		else {
																			throw new Exception("NO");
																		}
																	}
																	else {
																		throw new Exception("Debe de confirmar que no es un robot");
																	}
																}
																else {
																	throw new Exception("Clave menor a 6 caracteres");
																}
															}
															else {
																throw new Exception("La contraseña debe tener al menos un caracter especial");
															}
														}
														else {
															throw new Exception("La contraseña debe tener al menos un caracter númerico");
														}
													}
													else {
														throw new Exception("La contraseña debe tener por lo menos una letra mayúscula");
													}
												}
												else {
													throw new Exception("la contraseña debe tener al menos un caracter alfanúmerico");
												}
											}
											else {
												throw new Exception("La contraseña debe ser igual o mayor a 8 caracteres");
											}
										}
										else {
											throw new Exception("La clave no puede ser igual al correo");
										}
									}
									else {
										throw new Exception("La clave no puede ser igual al correo");
									}
								}
								else {
									throw new Exception("La clave no puede ser igual al correo");
								}
							}
							else {
								throw new Exception("La clave no puede ser igual al correo");
							}
						}
						else {
							throw new Exception("Claves diferentes");
						}
					}
					else {
					}
				}
				else {
					throw new Exception("Correo incorrecto");
				}
			}
			else {
				throw new Exception("Usuario en uso");
			}
		}
		else {
			throw new Exception("Alias incorrecto");
		}
	}
}
catch(Exception $error) {
	Page::showMessage(2, $error->getMessage() , null);
}

require_once ("../app/views/public/account/nuevacuenta_view.php");

?>