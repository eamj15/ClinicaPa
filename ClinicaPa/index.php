<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card" style="width: 30rem;">
      <div class="card-body">
        <h4 class="card-title text-center">Login</h4>
        <form action="php/login_process.php" method="post">
          <div class="form-group">
            <label for="cedula">Usuario</label>
            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula" required>
          </div>
          <div class="form-group">
            <label for="pass">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <p class="text-center mt-3">
          ¿No tienes una cuenta? <a href="registro.php">Registrate</a>
        </p>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>
</body>
</html>