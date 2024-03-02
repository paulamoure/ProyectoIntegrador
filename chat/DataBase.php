<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'chat';

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8 COLLATE utf8_spanish2_ci";
    $conn->exec($sql);
    echo "Database created or already exists successfully.\n";

    // Select the database
    $conn->exec("USE $dbname");

    // Create the table 'messages'
    $sql = "CREATE TABLE IF NOT EXISTS `messages` (
              `msg_id` int(11) NOT NULL AUTO_INCREMENT,
              `incoming_msg_id` int(255) NOT NULL,
              `outgoing_msg_id` int(255) NOT NULL,
              `msg` varchar(1000) NOT NULL,
              PRIMARY KEY (`msg_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_spanish2_ci";
    $conn->exec($sql);
    echo "Table 'messages' created or already exists successfully.\n";

    // Insert data into the table 'messages'
    $sql = "INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
            (1, 1622688038, 340066300, 'hola man'),
            (2, 340066300, 1622688038, 'bien'),
            (3, 1622688038, 340066300, 'hola'),
            (4, 340066300, 1622688038, 'hola'),
            (5, 440971576, 1622688038, 'hola pedro, necesito tu ayuda'),
            (6, 1622688038, 440971576, 'hola Mauricio, claro, dime !!')";
    $conn->exec($sql);
    echo "Data inserted into the table 'messages'.\n";

    // Create the table 'users'
    $sql = "CREATE TABLE IF NOT EXISTS `users` (
              `user_id` int(11) NOT NULL AUTO_INCREMENT,
              `unique_id` int(255) NOT NULL,
              `fname` varchar(255) NOT NULL,
              `lname` varchar(255) NOT NULL,
              `email` varchar(255) NOT NULL,
              `password` varchar(255) NOT NULL,
              `img` varchar(255) NOT NULL,
              `status` varchar(255) NOT NULL,
              PRIMARY KEY (`user_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_spanish2_ci";
    $conn->exec($sql);
    echo "Table 'users' created or already exists successfully.\n";

    // Insert data into the table 'users'
    $sql = "INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES
            (1, 1622688038, 'Mauricio', 'Sevilla', 'hola@configuroweb.com', '4b67deeb9aba04a5b54632ad19934f26', '1652660564avatar.png', 'Disponible'),
            (2, 340066300, 'Juan', 'Usuario', 'jusuario@cweb.com', '4b67deeb9aba04a5b54632ad19934f26', '1652660638staff-avatar.png', 'Desconectad@'),
            (3, 440971576, 'Pedro', 'Usuario', 'pusuario@cweb.com', '4b67deeb9aba04a5b54632ad19934f26', '1652670758chatbot.png', 'Disponible')";
    $conn->exec($sql);
    echo "Data inserted into the table 'users'.\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
