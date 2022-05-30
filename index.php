git<?php session_start();

if(isset($_SESSION['rol'])&& isset($_SESSION['username'])){
	switch($_SESSION['rol']){
	case 1:
	header('location:welcome.php');
	break;
	
	default:
	}
}
?>

<!doctype html>

<head>
<title>Iniciar Sesión Elmex Superior </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LOGIN</title>
	<form name="loginform" id="loginform" action="login.php" method="POST">
		<link href="style.css" media="screen" rel="stylesheet">

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
		crossorigin="anonymous"></script>

			
			<!--reCAPTCHA-->
			
			<script src = "https://www.google.com/recaptcha/api.js?render=6LedW5sbAAAAAFni1SdnNzOREVe8eX7FxmCrRMOj" >
		</script>

		<script>
			$(document).ready(function() {
				$('#login').click(function() {
					grecaptcha.ready(function() {
						grecaptcha.execute('6LedW5sbAAAAAFni1SdnNzOREVe8eX7FxmCrRMOj', {
							action: 'validarUsuario'
						}).then(function(token) {
							$('#loginform').prepend('<input type="hidden" name="token" value="' + token + '">');
							$('#loginform').prepend('<input type="hidden" name="action" value="validarusuario">');
							$('#loginform').submit();
						});
					});

				})
			})
		</script>


</head>

<body>

	<div class="login-box">
		<div class="titulo">
			<h4>Bienvenido al sistema de control de equipo de computo en sucursales.</h4>
			<img src="salinas.png" alt="100" width="100" >
		</div>
		<div class="login-text">

			<label for="user_login">Nombre de usuario<br />
				<input type="text" name="username" id="username" class="input" placeholder="Enter Username" value="" size="20" required="" /></label>

			<label for="user_pass">Contraseña<br />
				<input type="password" name="password" id="password" class="input" placeholder="Enter Password" value="" size="20" required="" /></label>

			<p class="submit">
				<input type="button" name="login" id="login" class="button" value="Iniciar Sesión" />
				<!--<button class="g-recaptcha" 
        data-sitekey="6LedW5sbAAAAAFni1SdnNzOREVe8eX7FxmCrRMOj" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button>-->

				<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		</div>
		</form>
	</div>
	</div>



</body>

</html>