<?php

    session_start();

    include 'conexion_db.php';

    $correo = $_POST['login_correo'];
    $password = $_POST['login_pass'];

    $validar_login = mysqli_query($con, "SELECT * FROM user WHERE correo='$correo' and password='$password'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location: ../../../paneldecontrol/index.php");
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