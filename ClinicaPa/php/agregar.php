<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $disponible = $_POST['disponible'];
    $precio = $_POST['precio'];

    // No es necesario el campo 'id' ya que es AUTO_INCREMENT
    $stmt = $conn->prepare("INSERT INTO medicamentos (nombre, disponible, precio) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $disponible, $precio]);

    header('Location: admin.php');
}
?>
