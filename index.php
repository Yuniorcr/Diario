
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style-user.css">
	<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
</head>
<body>
	<header class="header" style="background: #02C39A;">
		<img class="header__img" src="https://1.bp.blogspot.com/-pQPi5Da2H9U/WfkYvn_LYzI/AAAAAAAAAFQ/e5BtdNckVIobyzzmerV_UWIBlUY6MRo3gCLcBGAs/s400/logoepis.png" alt="logo">
	</header>
	<section class="login">
		<section class="login__container">
			<h2>Inicia Sesion</h2>
			<?php 
				session_start();
		        require_once 'login.php';
		        $conexion = new mysqli($hn, $un, $pw, $db);
		        if ($conexion->connect_error) die ("Fatal error");

		        if(!empty($_POST['user']) && !empty($_POST['pass']))
		        {
		            $user = mysql_fix_string($conexion, $_POST['user']);

		            $pass = md5($_POST['pass']);
		            
		            $query = "SELECT * FROM user WHERE correo='$user' AND password='$pass'";
		            $result = $conexion->query($query);
		            $_SESSION['Usuario'] = $user;
		            if ($result->num_rows >= 1)
		                header("Location: notas.php");
		            else
		                echo'<script type="text/javascript">
		                alert("Correo / Password incorrectos");
		                window.location.href="index.php";
		                </script>';
		        }
		        
		        function mysql_fix_string($coneccion, $string)
		        {
		            if (get_magic_quotes_gpc())
		                $string = stripcslashes($string);
		            return $coneccion->real_escape_string($string);
		        }

		     ?>
			<form class="login__container--form" action="validando.php" method="post">
				<input class="input" type="text" placeholder="Correo" name="user" required="">
				<input class="input" type="password" placeholder="password" name="pass" required="">
				<button class="button" type="submit" >Iniciar Sesion</button>
				<div class="login__container--remenber-me">
					<label>
						<input type="checkbox" id="checkbox1" value="checkbos">Recuerdame
					</label>
					<a href="/">Olvide mi Contrasena</a>
				</div>
			</form>
			<section class="login__container--social-media">
				<div><img src="./img/twitter-icon.png" alt="Twitter">Inicia sesion con Twitter</div>
				<div><img src="./img/google-icon.png" alt="Google">Inicia sesion con Google</div>
			</section>
			<p class="login__container--register">No tienes ninguna cuenta ?<a href="register.html">Registrate</a></p>
		</section>
	</section>
	<footer class="footer">
		<a href="/">Terminos de uso</a>
		<a href="/">Declaracion de privacidad</a>
		<a href="/">Centro de ayuda</a>
		<a href="https://www.facebook.com/Smith.87893373">Todos los derechos reservados Created By CLINTON CARDENAS</a>
	</footer>
</body>
</html>