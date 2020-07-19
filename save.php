<?php 
    session_start();
    $user = $_SESSION['Usuario'];
	require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $contenido = $_POST['contenido'];

    $query = "INSERT INTO notas( correo, titulo, fecha, contenido) VALUES('$user', '$titulo','$fecha','$contenido')";
    $result = $conexion->query($query);
    if ($conexion->connect_error) die ("Fatal error");
    header("location: notas.php")

    /*echo $_SESSION['Usuario'];
    if( $_SESSION['Usuario'] == null || $_SESSION['Usuario'] ='')
        header("Location: error.html");*/
?>