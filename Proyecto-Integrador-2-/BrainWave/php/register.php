<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-acc.css">
    <script src="../js/acc.js"></script>
    <title>BrainWave | Login</title>
</head>

<body>
    <button class="btn-close reg">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
            <path fill="none" d="M0 0h24v24H0V0z" />
            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" fill="var(--c-text-secondary)" />
        </svg>
    </button>
    <div class="box registro">
        <img class="img" src="../img/logo-transp.png" alt="">
        <h2 class="login"> <span class="span">R</span><span class="text-wrapper-2">EGISTER</span></h2>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="myForm">
            <div class="user-box">
                <input type="text" name="username" id="username">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="text" name="nombre" id="nombre">
                <label>First Name</label>
            </div>
            <div class="user-box">
                <input type="text" name="apellidos" id="apellido">
                <label>Last Name</label>
            </div>
            <div class="user-box">
                <input type="email" name="email" id="email">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password">
                <a href="#" class="toggle-eye" onclick="togglePasswordVisibility()">
                    <img src="../img/eye-close.png" alt="Toggle Password" id="eye-icon">
                </a>
                <label>Password</label>
                <a href="#" class="forgotten-pwd">Contraseña Olvidada?</a>
            </div>
            <span id="error_message" style="text-align:center;color:red"></span>
            <div class="boton-secundario"><button class="button" type="button" onclick="registro()">ENTRAR</button></div>
        </form>
        <br>
        <div class="crea-cuenta-login">
            <p>No tienes una cuenta?</p><a href="#">Crear cuenta</a>
        </div>
        <div class="terms">
            <a href="https://app.privacypolicies.com/wizard/terms-conditions" target="_blank">Términos y Condiciones</a>
        </div>
    </div>
    <?php
    // Asegúrate de incluir tus archivos de conexión y funciones
    require_once "conecta.php";
    require_once "tablas.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Conexión a la base de datos
        $conexion = getConexion();

        // Insertar en la tabla perfiles_personas
        $consulta = "INSERT INTO perfiles_personas (username, nombre, apellidos, email) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, 'ssss', $username, $nombre, $apellidos, $email);
        mysqli_stmt_execute($stmt);
        $id_paciente = mysqli_insert_id($conexion);

        // Verificar si se insertó correctamente en perfiles_personas
        if ($id_paciente > 0) {
            // Insertar en la tabla login
            $consulta_login = "INSERT INTO login (username, password) VALUES (?, ?)";
            $stmt_login = mysqli_prepare($conexion, $consulta_login);
            mysqli_stmt_bind_param($stmt_login, 'ss', $username, $password);
            mysqli_stmt_execute($stmt_login);
            $id_login = mysqli_insert_id($conexion);

            // Verificar si se insertó correctamente en login
            if ($id_login > 0) {
                // Insertar en la tabla pacientes_login
                $consulta_pacientes_login = "INSERT INTO pacientes_login (id_paciente, id_login) VALUES (?, ?)";
                $stmt_pacientes_login = mysqli_prepare($conexion, $consulta_pacientes_login);
                mysqli_stmt_bind_param($stmt_pacientes_login, 'ii', $id_paciente, $id_login);
                mysqli_stmt_execute($stmt_pacientes_login);
            } else {
                echo "<p>Error al registrar en login</p>";
            }
        } else {
            echo "<p>Error al registrar en perfiles_personas</p>";
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    }
    ?>

    </div>
</body>

</html>