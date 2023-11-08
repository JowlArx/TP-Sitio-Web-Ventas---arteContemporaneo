<?php
<<<<<<< HEAD
session_start();

include 'conexion_db.php';

$correo = $_POST['login_correo'];
$password = $_POST['login_pass'];

$validar_login = mysqli_query($con, "SELECT * FROM user WHERE correo='$correo' AND password='$password'");

if (mysqli_num_rows($validar_login) > 0) {
    $usuario = mysqli_fetch_assoc($validar_login);
    $_SESSION['usuario'] = $correo;
    
    if ($usuario['rol'] === 'admin') {
        header("location: ruta_hacia_pagina_administracion.php");
    } else {
        header("location: ../index.php");
    }
    exit();
} else {
    echo '
        <script>
        alert("El usuario no existe");
        window.location = "../../../../index.php";
        </script>
    ';
    exit();
}
?>
=======

    session_start();

    include 'conexion_db.php';

    $correo = $_POST['login_correo'];
    $pass = $_POST['login_pass'];

    $validar_login = mysqli_query($con, "SELECT * FROM usuarios WHERE correo='$correo' and pass='$pass'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location: ../../../index.php");
        exit();
    } else {
        echo '
            <script>
            alert("el usuario no existe");
            window.location = "../../index.php";
            </script>
        ';
        exit();
    }
?>
>>>>>>> 0ee51d0d3cdf5a911789b242869301e791fef243
