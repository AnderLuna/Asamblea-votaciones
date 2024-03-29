<?php
require_once 'database.php';



    // Capturar los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];
    $cargo = $_POST["cargo"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];


// Verificar si se han enviado datos del formulario de registro
if (validarID($id) === true) {


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
}


function validarID($ID) {
    // Verificar si la cadena tiene exactamente 10 caracteres y todos son números
    if(preg_match('/^[0-9]{10}$/', $ID)) {
        return true; // La cadena tiene exactamente 10 números
    } else {
        echo "El ( ID ) deben ser 10 numeros sin caracteres especiales";
        return false; // La cadena no tiene exactamente 10 números
    }
}

?>