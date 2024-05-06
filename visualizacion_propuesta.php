<?php
// Incluir el archivo de conexión a la base de datos
require_once 'database.php';

// Obtener los datos de las propuestas desde la base de datos
$conexion = Database::obtenerConexion();

// Consulta SQL para obtener los temas y sus propuestas
$query = "SELECT subtemas.idtema, tema, idpropuesta, descripcion, votos 
          FROM subtemas
          LEFT JOIN propuestas ON subtemas.idtema = propuestas.idtema 
          WHERE subtemas.idasamblea='$idasamblea' and subtemas.idusuario = '$id'";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos por tema
    while ($fila = $resultado->fetch_assoc()) {
        // Mostrar el nombre del tema
        echo "<div class='container'>";
        echo "<h2>Tema: " . $fila['tema'] . " -- Codigo: " . $fila['idtema'] . "</h2>";

        // Mostrar la tabla con las propuestas de ese tema
        echo "<form class='form-group'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>IdPropuesta</th>";
        echo "<th>Descripción</th>";
        echo "<th>Votos</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $fila['idpropuesta'] . "</td>";
        echo "<td>" . $fila['descripcion'] . "</td>";
        echo "<td>" . $fila['votos'] . "</td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";

        echo "</div>";
    }
} else {
    // Si no se encontraron propuestas, mostrar un mensaje
    echo "<div class='container'>";
    echo "<p>No se encontraron propuestas.</p>";
    echo "</div>";
}

// Cerrar la conexión a la base de datos
//$conexion->close();
?>