<?php
require_once "tablas.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibir datos del formulario
    $username = $_POST["username"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $passwd = $_POST["password"];

    // Hash de la contraseña antes de almacenarla en la base de datos
    $hashed_password = password_hash($passwd, PASSWORD_DEFAULT);

    // Consulta para verificar si el usuario ya existe
    $query = "SELECT * FROM login WHERE username='$username'";

    // Ejecución de la consulta
    if ($res = mysqli_query(getConexion(), $query)) {

        // Verificación de existencia del usuario
        if (mysqli_num_rows($res) > 0) {
            // Mensaje de error si el usuario ya existe
            echo "<div style='all: initial; display: flex; align-items: center; justify-content: center; text-align: center; width: 50%; height: 15px;'>";
            echo "<p>El nombre de usuario ya está en uso.</p>";
            echo "</div>";
        } else {
            // Si el usuario no existe, procede con el registro

            // Consulta para insertar el nuevo usuario en la tabla de login
            $insert_query = "INSERT INTO login (username, password) VALUES ('$username', '$hashed_password')";

            // Ejecutar la inserción
            if (mysqli_query(getConexion(), $insert_query)) {
                // Obtener el ID del usuario recién registrado
                $id_login = mysqli_insert_id(getConexion());

                // Consulta para insertar el nuevo perfil de persona
                $insert_persona_query = "INSERT INTO perfiles_personas (nombre, apellidos, email) VALUES ('$nombre', '$apellidos', '$email')";

                // Ejecutar la inserción
                if (mysqli_query(getConexion(), $insert_persona_query)) {
                    // Obtener el ID del perfil de persona recién registrado
                    $id_persona = mysqli_insert_id(getConexion());

                    // Consulta para relacionar el perfil de persona con el login
                    $insert_relacion_query = "INSERT INTO pacientes_login (id_paciente, id_login) VALUES ('$id_persona', '$id_login')";

                    // Ejecutar la inserción
                    if (mysqli_query(getConexion(), $insert_relacion_query)) {
                        // Redirección a la página de inicio de sesión
                        header('Location: login.php');
                        exit();
                    } else {
                        echo "Error al relacionar el perfil de persona con el login: " . mysqli_error(getConexion());
                    }
                } else {
                    echo "Error al insertar el perfil de persona: " . mysqli_error(getConexion());
                }
            } else {
                // Mensaje de error si falla la inserción
                echo "Error al registrar el usuario: " . mysqli_error(getConexion());
            }
        }
    } else {
        // Mensaje de error si falla la consulta
        echo "Error en la consulta: " . mysqli_error(getConexion());
    }
}
?>
