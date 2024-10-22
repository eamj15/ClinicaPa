<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <br>
  <br>
  <br>
  <br>
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card" style="width: 30rem;">
      <div class="card-body">
        <h4 class="card-title text-center">Registro</h4>
        <form action= "php/registrar.php" method="post">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name= "nombre" placeholder="Ingrese su nombre">
          </div>
          <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name= "apellido" placeholder="Ingrese su apellido">
          </div>
          <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="number" class="form-control" id="cedula" name= "cedula" placeholder="Ingrese su cédula">
          </div>
          <div class="form-group">
            <label for="telefono">Número de Teléfono</label>
            <input type="tel" class="form-control" id="telefono" name= "telefono" placeholder="Ingrese su número de teléfono">
          </div>
          <div class="form-group">
            <label for="fechaNacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name= "fecha_nacimiento" placeholder="Ingrese su fecha de nacimiento">
          </div>
          <div class="form-group">
            <label for="tipoSangre">Tipo de Sangre</label>
            <select class="form-control" name= "tipo_sangre" id="tipo_sangre">
              <option value="">Seleccione un tipo de sangre</option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name= "email" placeholder="Ingrese su Email">
          </div>

          <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" name= "direccion" placeholder="Ingrese su direccion">
          </div>

          <div class="form-group">
            <label for="pass">Contraseña</label>
            <input type="password" class="form-control" id="pass" name= "pass" placeholder="Ingrese su contraseña" minlength="8" require>
          </div>

          
          <button type="submit" class="btn btn-primary btn-block">Registrar</button>
        </form>
        <p class="text-center mt-3">
          ¿Ya tienes una cuenta? <a href="index.php">Inicia sesión</a>
        </p>
      </div>
    </div>
  </div>
  <br>
</body>
<?php include('footer.php'); ?>
</html>