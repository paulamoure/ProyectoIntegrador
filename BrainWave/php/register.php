<?php
require_once 'processReg.php';
require_once 'conecta.php';
require_once 'tablas.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/account.css">
    <title>BrainWave | Registro</title>
</head>
<body>
    <!-- botón para cerrar la página -->
    <!-- <button class="btn-close reg">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"> <path fill="none" d="M0 0h24v24H0V0z" /> <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" fill="var(--c-text-secondary)" /> </svg>
    </button> -->
    <!-- Registration box -->
    <div class="box registro">
        <img class="img" src="../img/logo-transp.png" alt="">
        <h2 class="login"> <span class="span">R</span><span class="text-wrapper-2">egistro</span></h2>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="myForm">
            <!-- User input -->
            <div class="user-box">
                <input type="text" name="username" id="username">
                <label>Username</label>
                <div id="error_user" style="display:none;"></div>
            </div>
            <div class="user-box">
                <input type="text" name="nombre" id="nombre">
                <label>Nombre</label>
                <div id="error_name" style="display:none;"></div>
            </div>
            <div class="user-box">
                <input type="text" name="apellidos" id="apellido">
                <label>Apellido</label>
                <div id="error_lastname" style="display:none;"></div>
            </div>
            <div class="user-box">
                <input type="email" name="email" id="email">
                <label>Email</label>
                <div id="error_mail" style="display:none;"></div>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password">
                <a href="#" class="toggle-eye" onclick="togglePasswordVisibility()">
                    <img src="../img/eye-close.png" alt="Toggle Password" id="eye-icon">
                </a>   
                <label>Contraseña</label>
                <div id="error_pwd" style="display:none;"></div>
            </div>
            <div class="boton-secundario"><button class="button" type="button" onclick="redirect()" id="btn_R" disabled>ENTRAR</button></div>
            <div id="registro_ok" style="display:none;"></div>
        </form>
        <br>
        <!-- "Footer"  -->
        <div class="crea-cuenta-login">
            <p>Ya tienes una cuenta?</p><a href="login.php">Login</a>
        </div>
        <div class="terms">
            <a href="https://app.privacypolicies.com/wizard/terms-conditions" target="_blank">Términos y Condiciones</a>
        </div>
    </div><br>
    <script src="../js/registro.js"></script>
</body>
</html>