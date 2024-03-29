<?php
require_once 'database.php'; 

if (!empty($_POST["titulo"]) && !empty($_POST["descripcion"])) {

    // Capturar los datos del formulario
    $id = $_POST['id'];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $IDPropuesta = generarNumeroAleatorio();
    $conexion = Database::obtenerConexion(); 

    // Consulta SQL para insertar la propuesta en la base de datos
    $query = "INSERT INTO propuestas (idpropuesta, titulo, descripcion, idusuario) VALUES ('$IDPropuesta', '$titulo', '$descripcion', '$id')";

    $sql = "INSERT INTO votaciones (idpropuesta, idusuario, votos) VALUES ('$IDPropuesta', '$id', 0)";

    // Ejecutar la consulta SQL y manejar los errores
    if ($conexion->query($query) === TRUE and $conexion->query($sql) === TRUE) {
        echo "Propuesta registrada correctamente.";
    } else {
        echo "Error al registrar la propuesta: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos después de usarla
    $conexion->close();
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
        $sql = "SELECT IDPropuesta FROM propuestas WHERE IDPropuesta = '$numeroString'";
        $resultado = $conexion->query($sql);

        // Si el número no existe en la base de datos, salir del bucle
        if ($resultado->num_rows == 0) {
            break;
        }

    } while (true);
    
    return $numeroString;
}
?>