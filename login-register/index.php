<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Register -- Arteraneo</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main>
        <div class="container_all">
            <div class="back_box">
                <div class="login_back_box">
                    <h3>
                        Ya estas registrado?
                    </h3>
                    <p>
                        inicia sesion para acceder
                    </p>
                    <button id="btn_login"> Iniciar sesion</button>
                </div>
                <div class="register_back_box">
                    <h3>
                        No estas registrado?
                    </h3>
                    <p>
                        Registrate para acceder
                    </p>
                    <button id="btn_register">Registrarme</button>
                </div>
            </div>
            <!--Formularios -->
            <div class="login_register_container">
                <!--login-->
                <form action="assets/php/user_login.php" method="POST" class="login_form">
                    <h2> 
                        Iniciar sesion
                    </h2>
                        <input type="text" placeholder="Correo Electronico" name="login_correo">
                        <input type="password" placeholder="Contraseña" name="login_pass">
                        <button>Ingresar</button>
                </form>
                <form action="assets/php/user_register.php" method="POST" class="register_form">
                    <!--register-->
                    <h2>
                        Registrarse
                    </h2>
                        <input type="text" placeholder="Nombre" name="register_nombre">
                        <input type="email" placeholder="Correo Electronico" name="register_correo">
                        <input type="text" placeholder="Usuario" name="register_usuario">
                        <input type="password" placeholder="Contraseña" name="register_pass">
                        <input type="text" placeholder="Razon Social" name="register_razonSocial">
                        <input type="number" placeholder="CUIT/CUIL" name="register_cuit">
                        <!--<label for="register_inscripcionAfip">Incscripto en AFIP?</label>
                        <input type="checkbox" placeholder="Incscripto en AFIP?" name="register_inscripcionAfip">-->
                    <button>Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/script.js"></script>
</body>
</html>