<?php
require_once 'database.php';

// Capturar los datos del formulario
$id = $_POST['id'];
$idpropuesta = $_POST["ideliminar"];

// Obtener la conexión a la base de datos
$conexion = Database::obtenerConexion();

// Validar votos y actualizar la propuesta
function validarVotos($conexion, $id, $idpropuesta){
    $sql = "SELECT votos FROM propuestas WHERE idpropuesta='$idpropuesta' AND idusuario='$id'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $votos = $fila['votos'];

        if ($votos == 0) {
            // Verificar si el ID del usuario ya existe en la base de datos
            $query = "DELETE FROM propuestas WHERE idpropuesta= '$idpropuesta' and idusuario='$id' and votos= 0";
            
            if ($conexion->query($query) === TRUE) {
                echo "Propuesta eliminada correctamente.";
            } else {
                echo "Error al eliminar Propuesta: " . $conexion->error;
            }
        } else {
            echo "No se puede eliminar la propuesta ya que tiene: " . $votos . " votos";
        }
    } else {
        echo "No se encontró ninguna propuesta con el ID especificado.";
    }
}

// Llamar a la función para validar votos y actualizar la propuesta
validarVotos($conexion, $id, $idpropuesta);

// Cerrar la conexión a la base de datos
$conexion->close();
?>