<?php
require_once 'database.php';

// Verificar si se han enviado datos de usuario y contraseña y si no están vacíos
if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    // Capturar los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validar los datos de usuario y contraseña (puedes implementar tus propias validaciones aquí)

    // Obtener la conexión a la base de datos
    $conexion = Database::obtenerConexion();

    // Consulta SQL para buscar al usuario en la base de datos
    $query = "SELECT id, nombre, apellido FROM usuarios WHERE usuario = '$username' AND contraseña = '$password'";

    // Ejecutar la consulta
    $resultado = $conexion->query($query);

    // Verificar si se encontró algún resultado
    if ($resultado->num_rows > 0) {
        // El usuario y la contraseña son válidos
        echo "Login exitoso. Bienvenido, $username!";
        
        $usuario = $resultado->fetch_assoc();
        
        // Verificar si el usuario y la contraseña son "admin" y "admon"
        if ($username == "admon" && $password == "admon") {
            // Redireccionar a admon.html
            header("Location: admon.html");
            exit(); // Asegurar que el script se detenga después de redirigir
        }else{
            header("Location: usuario.php?id={$usuario['id']}&nombre={$usuario['nombre']}&apellido={$usuario['apellido']}");
            exit(); // Asegurar que el script se detenga después de redirigir
        }
    } else {
        // El usuario o la contraseña son incorrectos
        echo "Usuario o contraseña incorrectos.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si los datos están vacíos, mostrar un mensaje de error
    echo "Por favor, ingresa tanto el nombre de usuario como la contraseña.";
}
?>