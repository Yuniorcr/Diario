<?php 
    session_start();
    
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");
    $id = $_POST['id'];
    $correo = $_POST['correo'];
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $contenido = $_POST['contenido'];

    $query = "UPDATE notas SET titulo = '$titulo', fecha = '$fecha',contenido = '$contenido' WHERE id = '$id' and correo = '$correo'";
    $result = $conexion->query($query);
    if ($conexion->connect_error) die ("Fatal error");
    header("location: notas.php")

    /*echo $_SESSION['Usuario'];
    if( $_SESSION['Usuario'] == null || $_SESSION['Usuario'] ='')
        header("Location: error.html");*/
?>