<?php
require_once 'database.php'; 

if (!empty($_POST["tema"]) && !empty($_POST["fecha"])) {

    // Capturar los datos del formulario
    $tema = $_POST['tema'];
    $fecha = $_POST['fecha'];
    $idasamblea = generarNumeroAleatorio();
    $conexion = Database::obtenerConexion();

    $fecha_format = date('Y-m-d', strtotime($fecha));

    // Consulta SQL para insertar la propuesta en la base de datos
    $query = "INSERT INTO asambleas (idasamblea, tema, fecha, estado) VALUES ('$idasamblea', '$tema', '$fecha_format', 'nueva')";

    // Ejecutar la consulta SQL y manejar los errores
    if ($conexion->query($query) === TRUE) {
        echo "Asamblea registrada correctamente.";
    } else {
        echo "Error al registrar la asamblea: " . $conexion->error;
    }

} else {
    // Si hay campos vacíos, mostrar un mensaje de error
    echo "Por favor, completa todos los campos del formulario.";
}

// Función para generar un número aleatorio de 5 dígitos que no exista en la base de datos
function generarNumeroAleatorio() {
    $conexion = Database::obtenerConexion();
    $numeroString = '';

    do {
        // Generar un número aleatorio de 5 dígitos
        $numero = rand(10000, 99999);
    
        // Convertir el número en una cadena
        $numeroString = (string) $numero;

        // Verificar si el número ya existe en la base de datos
        $sql = "SELECT idasamblea FROM asambleas WHERE idasamblea = '$numeroString'";
        $resultado = $conexion->query($sql);

        // Si el número no existe en la base de datos, salir del bucle
        if ($resultado->num_rows == 0) {
            break;
        }

    } while (true);
    
    return $numeroString;
}
?>