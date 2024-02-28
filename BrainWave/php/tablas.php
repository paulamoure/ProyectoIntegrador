<?php
require_once 'conecta.php';

// Definir las variables de conexión
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'BrainWave';

// Conexión a MySQL
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión al servidor MySQL: " . $conn->connect_error);
}

// Verificar si la base de datos 'BrainWave' ya existe
$query = "SHOW DATABASES LIKE '$dbname'";
$res = mysqli_query($conn, $query);
// Si la base de datos no existe, créala
if (!$res || mysqli_num_rows($res) == 0) {
    $sqlCreateDB = "CREATE DATABASE $dbname";
    if ($conn->query($sqlCreateDB) === TRUE) {
    } else {
        $conn->close();
        exit;
    }
    // Conexión a la base de datos 'BrainWave'
    $conn->select_db($dbname);

    // Crear las tablas
    $sqlCreateTables = "
CREATE TABLE IF NOT EXISTS perfiles_personas (
    id_paciente INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    email VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS login (
    id_login INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS pacientes_login (
    id_relacion INT PRIMARY KEY AUTO_INCREMENT,
    id_paciente INT,
    id_login INT,
    FOREIGN KEY (id_paciente) REFERENCES perfiles_personas(id_paciente),
    FOREIGN KEY (id_login) REFERENCES login(id_login)
);

CREATE TABLE IF NOT EXISTS datos_psicologos (
    id_psicologo INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellidos VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS contactos (
    id_contacto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    email VARCHAR(255),
    asunto VARCHAR(255),
    mensaje TEXT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS psicologos_pacientes (
    id_relacion INT PRIMARY KEY AUTO_INCREMENT,
    id_psicologo INT,
    id_paciente INT,
    FOREIGN KEY (id_psicologo) REFERENCES datos_psicologos(id_psicologo),
    FOREIGN KEY (id_paciente) REFERENCES perfiles_personas(id_paciente)
);

CREATE TABLE IF NOT EXISTS administradores (
    id_admin INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellidos VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS eventos_talleres (
    id_evento INT PRIMARY KEY AUTO_INCREMENT,
    nombre_evento VARCHAR(255),
    fecha DATE
);

CREATE TABLE IF NOT EXISTS eventos_pacientes (
    id_relacion INT PRIMARY KEY AUTO_INCREMENT,
    id_evento INT,
    id_paciente INT,
    FOREIGN KEY (id_evento) REFERENCES eventos_talleres(id_evento),
    FOREIGN KEY (id_paciente) REFERENCES perfiles_personas(id_paciente)
);
INSERT INTO login (username, password) VALUES ('Paula', 'Paula123');
INSERT INTO login (username, password) VALUES ('Miguel', 'Maiky123');
";

    if ($conn->multi_query($sqlCreateTables)) {
    } else {
        echo "Error al crear las tablas: " . $conn->error . "<br>";
    }
    // Al añadir esta sección, me sale un error 500 (Internal Server Error) y el JS deja de funcionar
}

// Cerrar la conexión
$conn->close();
