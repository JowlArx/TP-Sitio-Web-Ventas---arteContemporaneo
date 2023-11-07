<?php
    
    include 'conexion_db.php';

    $nombre = $_POST['register_nombre'];
    $correo = $_POST['register_correo'];
    $usuario = $_POST['register_usuario'];
    $pass = $_POST['register_pass'];
    $razonSocial = $_POST['register_razonSocial'];
    $cuit = $_POST['register_cuit'];

           $query =  "INSERT INTO user(nombre, correo, usuario, password, razonSocial, cuit) 
          VALUES('$nombre', '$correo', '$usuario', '$pass', '$razonSocial', '$cuit')";
    
    $verifyCorreo = mysqli_query($con, "SELECT * FROM user WHERE correo='$correo'");

    if(mysqli_num_rows($verifyCorreo) > 0){
        echo '  <script>
                    alert("El correo ya esta en uso");
                    window.location = "../../index.php";
                </script>
             ';
             exit();
    }

    $verifyUser = mysqli_query($con, "SELECT * FROM user WHERE usuario='$usuario'");

    if(mysqli_num_rows($verifyUser) > 0){
        echo '  <script>
                    alert("El nombre de usuario ya esta en uso");
                    window.location = "../../index.php";
                </script>
             ';
             exit();
    }

    $ejecutar = mysqli_query($con, $query);

    if($ejecutar){
        echo '
            <script>
                alert("felicidades usted a sido registrado exitosamente")
                window.location = "../../index.php"
            </script>
            ';
    } else {
        echo '
        <script>
            alert("error, intentelo nuevamente")
            window.location = "../../index.php"
        </script>
        ';
    }

    mysqli_close($con);
?>