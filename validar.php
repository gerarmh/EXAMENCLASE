<?php
	define('CLAVE', '6LedW5sbAAAAAKJEipfZzziVVdc11czixM_UwbGY');
	
	$token = $_POST['token'];
	$action = $_POST['action'];
	
	$cu = curl_init();
	curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($cu, CURLOPT_POST, 1);
	curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
	curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($cu);
	curl_close($cu);
	
	$datos = json_decode($response, true);
	
	print_r($datos);
	//Si el usuario obtiene un valor mayor en el recaptcha al valor establecido permitira el acceso al sistema
	if($datos['success'] == 1 && $datos['score'] >= 0.5){
		if($datos['action'] == 'validarusuario'){
			
		}
		//De lo contrario si el puntaje es menor mostrara el siguiente mensaje negandole el acceso
		} else {
		echo "ERES UN ROBOT";
	}	