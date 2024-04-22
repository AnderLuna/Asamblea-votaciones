<?php
// Aquí se debería incluir el archivo de conexión a la base de datos
require_once 'database.php';
$conexion = Database::obtenerConexion();
// Obtener el ID del usuario
$id = $_GET['id'];
// Obtener el ID de la propuesta y el ID de la asamblea seleccionada
$idpropuesta = $_POST['idpropuesta'];
$idasamblea = $_POST['idasamblea'];

// Realizar una consulta JOIN para obtener los datos de la propuesta, la asamblea y los votos
$query = "SELECT * FROM propuestas, votaciones WHERE propuestas.idpropuesta = votaciones.idpropuesta and idasamblea = '$idasamblea' and idvotante = '$id'";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    echo "Usted ya voto en la asamblea actual";
} else {
    $sql = "INSERT INTO votaciones (idpropuesta, idvotante) VALUES ('$idpropuesta', '$id')";
    if ($conexion->query($sql) === TRUE) {
        echo "Votación registrada correctamente";
    }
}
?>