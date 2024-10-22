<?php include 'php/db_connection.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Usuario - Buscar Medicamentos</title>
    <style>
        .container {
            margin-top: 50px;
        }
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php include('header.php'); ?>
    <div class="container">
        <div class="text-center">
            <h2 class="mb-4">Buscar Medicamentos Disponibles</h2>
        </div>

        <form method="get" class="form-inline justify-content-center">
            <div class="form-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Buscar medicamento" required>
            </div>
            <button type="submit" class="btn btn-primary ml-2 mb-3">Buscar</button>
        </form>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad Disponible</th>
                            <th>Precio</th>
                            <th>Comprar</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
<?php include('footer.php'); ?>
</html>