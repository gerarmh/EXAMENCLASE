
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
	
	/*print_r($datos);*/
	
	if($datos['success'] == 1 && $datos['score'] >= 0.7){
		session_start(); 
include "conexion.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$pass = validate($_POST['password']);

	if (empty($username)) {
		header("Location: index.php?error=Se require nombre de usuario.");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Se requiere contraseña.");
	    exit();
	}else{
		$sql = "SELECT * FROM empleados WHERE username='$username' AND password='$pass'";

		$result = mysqli_query($bd, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['username'];
				$_SESSION['rol'] = $row['rol'];
				switch($_SESSION['rol']){
					case 1:
					header('location:welcome.php');
					exit();
					break;
					
					case 2:
						header('location:error.php');
						break;
					default:
					}
            	            }else{
				header("Location: index.php?error=Usuario o contraseña incorrectos.");
		        exit();
			}
		}else{
			header("Location: index.php?error=Usuario o contraseña incorrectos.");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
		if($datos['action'] == 'validarusuario'){
			
		}
		
		} else {
		echo "<script type='text/javascript'>
alert('¡Ups, parece que algo ha salido mal :( !');
window.location='index.php';
</script>";
	}	




/*-----------------------------------------------*/
