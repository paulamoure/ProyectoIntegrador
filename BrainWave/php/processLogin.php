<?php
session_start();
require_once "tablas.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $passwd = $_POST["password"];

    // Consulta preparada para evitar inyección de SQL
    $query = "SELECT * FROM login WHERE username=?";
    
    // Preparar la consulta
    $stmt = mysqli_prepare(getConexion(), $query);
    
    // Vincular parámetros
    mysqli_stmt_bind_param($stmt, "s", $username);
    
    // Ejecutar la consulta
    if (mysqli_stmt_execute($stmt)) {

        // Obtención del resultado
        $res = mysqli_stmt_get_result($stmt);
        
        // Obtención del primer elemento (fila) del resultado
        $elemento = mysqli_fetch_assoc($res);

        // Verificación de existencia del usuario y coincidencia de contraseña
        if ($elemento && password_verify($passwd, $elemento["password"])) {

            // Redirección a la página del paciente con el nombre de usuario como parámetro
            $_SESSION["username"] = $username;
            header('Location: home.php');
            exit();
        } else {
            // Mensaje de error si la contraseña o el nombre de usuario son incorrectos
            echo "<div style='all: initial; display: flex; align-items: center; justify-content: center; text-align: center; background-color: rgba(255, 0, 0, 0.5); width: 100%; height: 80px;'>";
            echo "<p>La contraseña es incorrecta</p>";
            echo "</div>";
        }
    } else {
        // Mensaje de error si la consulta falla
        echo "<span>Error en la consulta</span>";
    }

    // Cerrar la declaración preparada
    mysqli_stmt_close($stmt);
}
?>
