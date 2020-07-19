<?php 

	require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");

    //include 'login.php';
    if (!empty($_POST['Nombre']) && !empty($_POST['Correo']) ) {
        $nombre = $_POST['Nombre'];
        $correo = $_POST['Correo'];
        $password = md5($_POST['password']);

        $query = "INSERT INTO user( nombre, correo, password) VALUES('$nombre', '$correo','$password')";
    }
    

    $verify_user = mysqli_query($conexion, " SELECT * FROM user WHERE correo= '$correo'");

    if (mysqli_num_rows($verify_user) > 0) {
    	echo'<script type="text/javascript">
	    alert("Correo en uso, Escoja otro");
	    window.location.href="register.html";
	    </script>';
    	exit;
    }else{
    	echo'<script type="text/javascript">
	    alert("Register succesfull");
	    window.location.href="index.php";
	    </script>';
    }
    $result = mysqli_query($conexion,$query);