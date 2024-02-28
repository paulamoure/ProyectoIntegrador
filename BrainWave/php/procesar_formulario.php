<?php
require_once 'conecta.php';

// Recoger datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

// Insertar datos en la tabla de contactos
$sqlInsertContacto = "INSERT INTO contactos (nombre, email, asunto, mensaje) VALUES ('$nombre', '$email', '$asunto', '$mensaje')";

if (mysqli_query(getConexion(), $sqlInsertContacto)) {
    echo "¡Gracias por contactarnos!";
} else {
    echo "Error: " . $sqlInsertContacto . "<br>" . mysqli_error(getConexion());
}
?>
