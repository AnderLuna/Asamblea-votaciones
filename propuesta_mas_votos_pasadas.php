<?php
// Aquí se debería incluir el archivo de conexión a la base de datos
require_once 'database.php';

// Obtener la conexión a la base de datos
$conexion = Database::obtenerConexion();

// Consulta SQL para obtener la propuesta más votada por asamblea en estado "cerrada"
$query = "
    SELECT p.idasamblea, p.idpropuesta, p.titulo, p.descripcion, p.votos, p.estado
    FROM propuestas p
    INNER JOIN (
        SELECT idasamblea, MAX(votos) AS max_votos
        FROM propuestas
        WHERE estado = 'cerrada'
        GROUP BY idasamblea
    ) AS max_votos_per_asamblea
    ON p.idasamblea = max_votos_per_asamblea.idasamblea
    AND p.votos = max_votos_per_asamblea.max_votos
    WHERE p.estado = 'cerrada'
";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en la tabla HTML
    echo '<div class="container">';
    echo '<h2>Propuestas Ganadoras</h2>';
    echo '<form class="form-group">';
    echo '<table>';
    echo '<tr>';
    echo '<th>IdAsamblea</th>';
    echo '<th>IdPropuesta</th>';
    echo '<th>Título</th>';
    echo '<th>Descripción</th>';
    echo '<th>Votos</th>';
    echo '<th>Estado</th>';
    echo '</tr>';

    while ($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $fila['idasamblea'] . '</td>';
        echo '<td>' . $fila['idpropuesta'] . '</td>';
        echo '<td>' . $fila['titulo'] . '</td>';
        echo '<td>' . $fila['descripcion'] . '</td>';
        echo '<td>' . $fila['votos'] . '</td>';
        echo '<td>' . $fila['estado'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</form>';
    echo '</div>';
} else {
    // Si no se encontraron propuestas ganadoras en estado "cerrada", mostrar un mensaje
    echo '<div class="container">';
    echo '<h2>Propuestas Ganadoras</h2>';
    echo '<p>No se encontraron propuestas ganadoras en estado "cerrada".</p>';
    echo '</div>';
}

// Cerrar la conexión a la base de datos después de utilizarla completamente
$conexion->close();
?>

