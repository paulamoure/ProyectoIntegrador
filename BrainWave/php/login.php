<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-acc.css">
    <title>BrainWave | Login</title>
</head>
<body>
    <!-- botón para cerrar la página -->
    <button class="btn-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" fill="var(--c-text-secondary)"/></svg>
    </button>
    <!-- Login box -->
    <div class="box">
        <img class="img" src="../img/logo-transp.png" alt="logo cerebro">
        <h2 class="login"> <span class="span">L</span><span class="text-wrapper-2">OGIN</span></h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="myForm">
            <!-- User input -->
            <div class="user-box">
                <input type="text" name="username" id="username">
                <label>Usuario</label>
                <div id="error_user" style="display:none;"></div>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password">
                <a href="#" class="toggle-eye" onclick="togglePasswordVisibility()">
                    <img src="../img/eye-close.png" alt="Toggle Password" id="eye-icon">
                </a>
                <label>Password</label>
                <a href="#" class="forgotten-pwd">Contraseña Olvidada?</a>
                <div id="error_pwd" style="display:none;"></div>
                <div id="error_login" style="display:none;"></div>
            </div>
            <!-- Login btn -->
            <div class="boton-secundario"><button type="submit" class="button" onclick="login()" id="login-btn" disabled>ENTRAR</button></div>
        </form>
        <br>
        <!-- "Footer"  -->
        <div class="crea-cuenta-login">
            <p>No tienes una cuenta?</p><a href="register.php">Crear cuenta</a>
        </div>
        <div class="terms">
            <a href="https://app.privacypolicies.com/wizard/terms-conditions" target="_blank">Términos y Condiciones</a>
        </div><br>
    </div>
    <script src="../js/user.js"></script>
</body>
</html>