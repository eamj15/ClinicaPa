<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Administrador - Gestión de Inventario</title>
    <style>
        .container {
            margin-top: 50px;
        }
        .table {
            margin-top: 20px;
        }
        .form-inline {
            justify-content: center;
        }
        .form-control {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h2 class="mb-4">Gestión de Inventario</h2>
        </div>

        <!-- Formulario para agregar nuevos medicamentos -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>Agregar Nuevo Medicamento</h4>
                <form method="post" action="agregar.php" class="form-inline justify-content-center">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del Medicamento" required>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="number" name="disponible" class="form-control" placeholder="Cantidad Disponible" required>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="number" step="0.01" name="precio" class="form-control" placeholder="Precio" required>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Agregar</button>
                </form>
            </div>
        </div>

        <!-- Tabla para mostrar y actualizar medicamentos -->
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad Disponible</th>
                            <th>Precio</th>
                            <th>Actualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $conn->query("SELECT * FROM medicamentos");
                        while ($row = $stmt->fetch()) {
                            echo "<tr>";
                            echo "<form method='post' action='actualizar.php'>";
                            echo "<td><input type='text' name='nombre' value='{$row['nombre']}' class='form-control' required></td>";
                            echo "<td><input type='number' name='disponible' value='{$row['disponible']}' class='form-control' required></td>";
                            echo "<td><input type='number' step='0.01' name='precio' value='{$row['precio']}' class='form-control' required></td>";
                            echo "<input type='hidden' name='id' value='{$row['id']}'>";
                            echo "<td><button type='submit' class='btn btn-success'>Actualizar</button></td>";
                            echo "</form>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
