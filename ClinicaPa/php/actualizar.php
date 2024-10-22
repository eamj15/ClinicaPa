<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $disponible = $_POST['disponible'];
    $precio = $_POST['precio'];

    $stmt = $conn->prepare("UPDATE medicamentos SET nombre = ?, disponible = ?, precio = ? WHERE id = ?");
    $stmt->execute([$nombre, $disponible, $precio, $id]);

    header('Location: admin.php');
}
?>
