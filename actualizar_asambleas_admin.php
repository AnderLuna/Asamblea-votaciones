<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idasamblea = $_POST['idasamblea'];
    $accion = $_POST['accion'];

    $conexion = Database::obtenerConexion();

    function ActualizarEstadoAsamblea($conexion, $idasamblea, $accion){
        // Verificar si la acción es activar
        if ($accion === "Activar") {
            // Verificar si hay alguna asamblea activa
            $sql_asamblea_activa = "SELECT * FROM asambleas WHERE estado='activa'";
            $resultado_asamblea_activa = $conexion->query($sql_asamblea_activa);
            
            if ($resultado_asamblea_activa->num_rows == 0) {
                // No hay asambleas activas, se puede activar esta
                $query = "UPDATE asambleas SET estado='activa' WHERE idasamblea='$idasamblea'";
                
                if ($conexion->query($query) === TRUE) {
                    echo "Asamblea activada correctamente.";
                } else {
                    echo "Error al activar la asamblea: " . $conexion->error;
                }
            } else {
                echo "Ya existe una asamblea activa. No se puede activar otra.";
            }
        } elseif ($accion === "Cerrar") {
            // Si la acción es cerrar, simplemente se actualiza el estado
            $query = "UPDATE asambleas SET estado='cerrada' WHERE idasamblea='$idasamblea'";
            
            if ($conexion->query($query) === TRUE) {
                echo "Asamblea cerrada correctamente.";
            } else {
                echo "Error al cerrar la asamblea: " . $conexion->error;
            }
        } else {
            // Si la acción no es válida
            echo "Acción no válida.";
        }
    }

    ActualizarEstadoAsamblea($conexion, $idasamblea, $accion);
    $conexion->close();
}
?>
