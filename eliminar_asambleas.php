<?php
require_once 'database.php';

// Capturar los datos del formulario
$idasamblea = $_POST["idasamblea"];

// Obtener la conexión a la base de datos
$conexion = Database::obtenerConexion();

// Validar votos y actualizar la propuesta
function validarAsamblea($conexion, $idasamblea){
    $sql = "SELECT * FROM asambleas, propuestas WHERE asambleas.idasamblea = propuestas.idasamblea and asambleas.idasamblea = '$idasamblea'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        echo "No se puede eliminar la asamblea porque ya tiene propuestas registradas.";
    } else {
        $query = "DELETE FROM asambleas WHERE idasamblea = '$idasamblea'";
        
        if ($conexion->query($query) === TRUE) {
            echo "asamblea eliminada correctamente.";
        } else {
            echo "Error al eliminar asamblea: " . $conexion->error;
        }        
    }
}

// Llamar a la función para validar votos y actualizar la propuesta
validarAsamblea($conexion, $idasamblea);

// Cerrar la conexión a la base de datos
$conexion->close();
?>