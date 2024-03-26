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

    // Verificar si el ID del usuario ya existe en la base de datos
    $query_verificar = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado_verificar = $conexion->query($query_verificar);

    if ($resultado_verificar->num_rows > 0) {
        // Si el ID ya existe, mostrar un mensaje de error y terminar la ejecución
        echo " USUARIO NO REGISTRADO. El ID $id YA está en uso, por favor ingrese un ID válido.";
        exit(); // Terminar la ejecución del script
    }

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