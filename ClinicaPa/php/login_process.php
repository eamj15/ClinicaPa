<?php
session_start();
include 'db_connection.php'; // Asegúrate de que la ruta a tu archivo de conexión sea correcta

// Verificar si se han enviado datos a través del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $cedula = trim($_POST['cedula']);
    $password = trim($_POST['pass']);

    // Crear la consulta SQL para obtener el usuario
    $sql = "SELECT * FROM PACIENTES WHERE cedula = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("s", $cedula);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si la cédula existe
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password, $user['pass'])) {
            // Autenticación exitosa, guardar la sesión
            $_SESSION['id_paciente'] = $user['id_paciente'];
            $_SESSION['cedula'] = $user['cedula'];

            // Redirigir a la página de bienvenida o a la página principal
            header("Location: ../usuario.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta.";
        }
    } else {
        // Cédula no encontrada
        echo "Cédula no encontrada.";
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    // Si no se envió un POST, redirigir al formulario de login
    header("Location: ../index.php"); // Cambia 'index.php' si es necesario
    exit();
}
?>
