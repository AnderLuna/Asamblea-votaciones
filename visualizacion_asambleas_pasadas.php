<?php
// Aquí se debería incluir el archivo de conexión a la base de datos
require_once 'database.php';

// Obtener la conexión a la base de datos
$conexion = Database::obtenerConexion();

// Consulta SQL para obtener el total de votos por asamblea
$query = "SELECT asambleas.idasamblea, asambleas.tema, asambleas.fecha, asambleas.estado, SUM(propuestas.votos) AS total_votos FROM asambleas, propuestas WHERE asambleas.idasamblea=propuestas.idasamblea and asambleas.estado = 'cerrada' GROUP BY asambleas.idasamblea";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['idasamblea'] . "</td>";
        echo "<td>" . $fila['tema'] . "</td>";
        echo "<td>" . $fila['fecha'] . "</td>";
        echo "<td>" . $fila['estado'] . "</td>";
        echo "<td>" . $fila['total_votos'] . "</td>";
        echo "</tr>";
    }
} else {
    // Si no se encontraron asambleas disponibles, mostrar un mensaje en la tabla
    echo "<tr><td colspan='5'>No se encontraron asambleas o propuestas.</td></tr>";
}

// Cerrar la conexión a la base de datos
//$conexion->close();
?>
