<?php

// Acceder a los datos JSON enviados desde el cliente
$datos_json = file_get_contents('php://input');
$datos = json_decode($datos_json, true);

// Aquí puedes realizar la lógica necesaria con los datos recibidos
// Por ejemplo, insertar datos en la base de datos

// Enviar una respuesta al cliente
$respuesta = array('mensaje' => 'Solicitud recibida correctamente');
echo json_encode($respuesta);
?>
