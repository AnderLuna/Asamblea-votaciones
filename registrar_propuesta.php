<?php
require_once 'database.php'; 

if (!empty($_POST["titulo"]) && !empty($_POST["descripcion"])) {

    // Capturar los datos del formulario
    $id = $_POST['id'];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $IDPropuesta = generarNumeroAleatorio();
    $conexion = Database::obtenerConexion(); 

    $consul = "SELECT idasamblea FROM asambleas WHERE estado='activa'";
    $resultado = $conexion->query($consul);

    if ($resultado->num_rows > 0) {
        $data = $resultado->fetch_assoc();
        $idasamblea = $data['idasamblea'];

        // Consulta SQL para insertar la propuesta en la base de datos
        $query = "INSERT INTO propuestas (idpropuesta, titulo, descripcion, idusuario, votos) VALUES ('$IDPropuesta', '$titulo', '$descripcion', '$id', 0)";

        // Ejecutar la consulta SQL y manejar los errores
        if ($conexion->query($query) === TRUE) {
            echo "Propuesta registrada correctamente.";
        } else {
            echo "Error al registrar la propuesta: " . $conexion->error;
        }

        // Cerrar la conexión a la base de datos después de usarla
        $conexion->close();        
    }else{
        echo "Aun no hay asambleas Activas";
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
        $sql = "SELECT idpropuesta FROM propuestas WHERE idpropuesta = '$numeroString'";
        $resultado = $conexion->query($sql);

        // Si el número no existe en la base de datos, salir del bucle
        if ($resultado->num_rows == 0) {
            break;
        }

    } while (true);
    
    return $numeroString;
}
?>