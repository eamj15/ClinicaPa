<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die('Medicamento no especificado.');
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM medicamentos WHERE id = ?");
$stmt->execute([$id]);
$medicamento = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cantidad = $_POST['cantidad'];
    $total = $cantidad * $medicamento['precio'];

    // Actualizar inventario
    $nuevaCantidad = $medicamento['disponible'] - $cantidad;
    if ($nuevaCantidad >= 0) {
        $stmt = $conn->prepare("UPDATE medicamentos SET disponible = ? WHERE id = ?");
        $stmt->execute([$nuevaCantidad, $id]);

        // Registrar venta
        $stmt = $conn->prepare("INSERT INTO ventas (medicamento_id, cantidad, total) VALUES (?, ?, ?)");
        $stmt->execute([$id, $cantidad, $total]);

        header("Location: factura.php?id={$conn->lastInsertId()}");
    } else {
        echo "<script>alert('No hay suficiente stock disponible.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/bootstrap.min.css">
    <title>Comprar Medicamento</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Comprar Medicamento: <?php echo $medicamentos['nombre']; ?></h2>
        <p>Precio por unidad: $<?php echo $medicamentos['precio']; ?></p>
        <p>Cantidad disponible: <?php echo $medicamentos['disponible']; ?></p>
        <form method="post">
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" id="cantidad" min="1" max="<?php echo $medicamentos['disponible']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Comprar</button>
        </form>
    </div>
</body>
</html>
