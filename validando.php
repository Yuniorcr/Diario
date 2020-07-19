<?php
	session_start();
	$user1 = $_POST['user'];

    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");

    if(isset($_POST['user']) && isset($_POST['pass']))
    {
        $user = mysql_fix_string($conexion, $_POST['user']);

        $pass = md5($_POST['pass']);
        
        $query = "SELECT * FROM user WHERE correo='$user' AND password='$pass'";
        $result = $conexion->query($query);
        $_SESSION['Usuario'] = $user1;
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