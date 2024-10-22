<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die('Factura no especificada.');
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT ventas.*, medicamentos.nombre FROM ventas JOIN medicamentos ON ventas.medicamento_id = medicamentos.id WHERE ventas.id = ?");
$stmt->execute([$id]);
$venta = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/bootstrap.min.css">
    <title>Factura</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Factura</h2>
        <p><strong>Medicamento:</strong> <?php echo $venta['nombre']; ?></p>
        <p><strong>Cantidad:</strong> <?php echo $venta['cantidad']; ?></p>
        <p><strong>Total a pagar:</strong> $<?php echo $venta['total']; ?></p>
        <p><strong>Fecha de compra:</strong> <?php echo $venta['fecha']; ?></p>
        <a href="usuario.php" class="btn btn-primary">Volver al inventario</a>
    </div>
</body>
</html>
