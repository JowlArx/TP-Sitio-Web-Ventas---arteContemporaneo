<?php

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