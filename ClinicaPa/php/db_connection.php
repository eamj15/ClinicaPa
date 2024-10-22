<?php
$servername = "localhost";
$username = "root"; // Cambiar según tu configuración
$password = "";     // Cambiar según tu configuración
$dbname = "bdds7";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>
