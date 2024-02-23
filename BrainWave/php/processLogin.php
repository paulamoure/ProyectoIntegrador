<?php
require_once "tablas.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $passwd = $_POST["password"];

    // Consulta para buscar al paciente por nombre de usuario
    $query = "SELECT * FROM login WHERE username='$username'";

    // Ejecución de la consulta
    if ($res = mysqli_query(getConexion(), $query)) {

        // Obtención del primer elemento (fila) del resultado
        $elemento = mysqli_fetch_assoc($res);

        // Verificación de existencia del usuario y coincidencia de contraseña
        if ($elemento && $elemento["password"] == $passwd) {

            // Redirección a la página del paciente con el nombre de usuario como parámetro
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $passwd;
            header('Location: home.php');
            exit();
        } else {
            // Mensaje de error si la contraseña o el nombre de usuario son incorrectos
            echo "<div style='all: initial; display: flex; align-items: center; justify-content: center; text-align: center; background-color: rgba(255, 0, 0, 0.5); width: 100%; height: 80px;'>";
            echo "<p>La contraseña es erronea</p>";
            echo "</div>";
        }
    } else {
        // Mensaje de error si el usuario no existe
        echo "<span>Usuario no existe</span>";
    }
}
