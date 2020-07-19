<?php
	session_start();
	//error_reporting(0);
	$session = $_SESSION['Usuario'];
	if ($session  == null || $session = '') {
		header("location:error.html");
		die();	
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>hola</title>
		<link rel="stylesheet" href="css/style-note.css">
		<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
	</head>

	<body>
		<header class="header">
			<img class="header__img" src="https://1.bp.blogspot.com/-pQPi5Da2H9U/WfkYvn_LYzI/AAAAAAAAAFQ/e5BtdNckVIobyzzmerV_UWIBlUY6MRo3gCLcBGAs/s400/logoepis.png">
			<div class="header__menu">
				<div class="header__menu--profile">
					<img src="img/user-png-icon.png" alt="user">
					<p>Perfil</p>
				</div>
				<ul>
					<li><a href="/">Cuenta</a></li>
					<li><a href="cerrar_sesion.php">Cerrar Sesion</a></li>
				</ul>
			</div>
		</header>
		<section class="main">
			<form action="notas_search.php"  method="post">
				<input class="input" name="buscar" type="text" placeholder="Buscar...">
				<button  class="button"  type="submit">buscar</button>
			</form>
		</section>
		<section class="carousel" >
			<div class="">
				<?php 
		        	require_once 'login.php';
				    $conexion = new mysqli($hn, $un, $pw, $db);
				    if ($conexion->connect_error) die ("Fatal error");

				    $buscar = $_POST['buscar'];
				    $user = $_SESSION['Usuario'];
					$query = "SELECT * FROM notas WHERE correo = '$user' AND contenido LIKE '%$buscar%' ";
			        $result = $conexion->query($query);
			        if (!$result) die ("Falló el acceso a la base de datos");

			        $rows = $result->num_rows;

			        for ($j = 0; $j < $rows; $j++)
			        {
			            $row = $result->fetch_array(MYSQLI_NUM);

			            $r0 = htmlspecialchars($row[0]);
			            $r1 = htmlspecialchars($row[1]);
			            $r2 = htmlspecialchars($row[2]);
			            $r3 = htmlspecialchars($row[3]);
			            $r4 = htmlspecialchars($row[4]);
						    echo "<pre>";
						    echo "titulo: $r2  ".'<br>';        
						    echo "fecha: $r3".'<br>';       
						    echo "descripcion: $r4".'<br>';      
						    echo "</pre>";     
						    echo "<form action='register_note.php' method='post'>";       
						    echo "<input type='hidden' name='editar' value='yes'>";       
						    echo "<input type='hidden' name='idcom' value='$r3'>"."<input type='submit' value='Editar'></form>";	
			        }
				 ?>
				<button class="button"><a href="register_note.php">Nueva nota</a></button>
			</div>
		</section>
		<footer class="footer">
			<a href="/">Terminos de uso</a>
			<a href="/">Declaracion de privacidad</a>
			<a href="/">Centro de ayuda</a>
			<a href="https://www.facebook.com/Smith.87893373">Todos los derechos reservados Created By CLINTON CARDENAS</a>
		</footer>
	</body>
</html>