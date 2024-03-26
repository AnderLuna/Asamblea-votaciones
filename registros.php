<?php
require_once 'database.php';

// Verificar si se han enviado datos del formulario de registro
if (!empty($_POST["id"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["edad"]) && !empty($_POST["cargo"]) && !empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
    // Capturar los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];
    $cargo = $_POST["cargo"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Obtener la conexión a la base de datos
    $conexion = Database::obtenerConexion();

    // Preparar la consulta SQL para insertar un nuevo usuario
    $query = "INSERT INTO usuarios (id, nombre, apellido, edad, cargo, email, usuario, contraseña) VALUES ('$id', '$nombre', '$apellido', '$edad', '$cargo', '$email', '$username', '$password')";

    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error al registrar usuario: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si hay campos vacíos, mostrar un mensaje de error
    echo "Por favor, completa todos los campos del formulario.";
}
?>