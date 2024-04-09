<?php
require_once 'database.php';

    // Capturar los datos del formulario
    $id = trim($_POST["id"]); //Trim: elimina los espacios vacios al inicio y final de una cadena de txt
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $edad = trim($_POST["edad"]);
    $cargo = trim($_POST["cargo"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    

// Verificar si se han enviado datos del formulario de registro
if (validarID($id) && validarCampos($nombre, $apellido, $cargo) && validarEmail($email)){

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

    // Verificar si el nombre de usuario ya existe en la base de datos
    $query_verificar_username = "SELECT * FROM usuarios WHERE usuario = '$username'";
    $resultado_verificar_username = $conexion->query($query_verificar_username);

    if ($resultado_verificar_username->num_rows > 0) {
        // Si el usuario ya existe, mostrar un mensaje de error y terminar la ejecución
        echo "El nombre de usuario '$username' ya está en uso, por favor elige otro.";
        exit();
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
        echo "El ID debe ser una cadena de 10 dígitos.";
        return false; // La cadena no tiene exactamente 10 números
    }
}

function validarCampos($nombre, $apellido, $cargo) {
    // Verificar si alguno de los campos está en blanco
    if (empty($nombre) || empty($apellido) || empty($cargo)) {
        echo "Los campos: nombre, apellido y cargo NO pueden estar vacios.";
        return false;
    } else {
        return true;
    }
}

function validarEmail($correo) {

    // Verificar si el correo está vacío 
    if (empty($correo)) {
        echo "El correo electrónico está vacío.";
        return false;
    }
    // Verificar si el formato del correo electrónico es válido
    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        // Verificar si el correo electrónico contiene caracteres especiales
        if (preg_match('/[\'^£$%&*()}{#~?><>,|=+¬]/', $correo)) {
            echo "El correo electrónico no puede contener caracteres especiales.";
            return false;
        } else {
            return true; // El correo electrónico es válido y no contiene caracteres especiales
        }
    } else {
        echo  "El formato del correo electrónico es inválido.";
        return false;
    }
}
?>
