<?php
session_start();

// Conexión a la base de datos
$host = "localhost";
$dbname = "bdds7";
$username = "root";
$password = "";

try {
    // Establecer conexión con PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoger los datos del formulario
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $cedula = trim($_POST['cedula']);
        $telefono = trim($_POST['telefono']);
        $fecha_nacimiento = trim($_POST['fecha_nacimiento']);
        $direccion = trim($_POST['direccion']);
        $tipo_sangre = trim($_POST['tipo_sangre']);
        $pass = trim($_POST['pass']);
        $email = trim($_POST['email']);

        // Hashear la contraseña
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        // Consulta SQL para insertar los datos en la tabla PACIENTES
        $sql = "INSERT INTO PACIENTES (nombre, apellido, cedula, telefono, fecha_nacimiento, tipo_sangre, email, direccion, pass) 
                VALUES (:nombre, :apellido, :cedula, :telefono, :fecha_nacimiento, :tipo_sangre, :email, :direccion, :pass)";
        
        // Preparar la consulta
        $stmt = $conn->prepare($sql);
        
        // Asignar valores a los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':tipo_sangre', $tipo_sangre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':pass', $hashedPassword); // Usar el hash de la contraseña
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Confirmar el registro
            echo "Registro exitoso";
            // Redirigir a otra página si es necesario
            // header("Location: ../index.php");
            // exit();
        } else {
            echo "Error al registrar el usuario.";
        }
    }
} catch (PDOException $e) {
    // Manejar errores en la conexión o la consulta
    echo "Error en la conexión: " . $e->getMessage();
}
?>