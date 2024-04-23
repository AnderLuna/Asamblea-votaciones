<?php
// Aquí se debería incluir el archivo de conexión a la base de datos
require_once 'database.php';

// Obtener los datos de las propuestas desde la base de datos
$conexion = Database::obtenerConexion();

// Consulta SQL para obtener las propuestas
$query = "SELECT idasamblea, idpropuesta, usuarios.nombre, propuestas.descripcion, propuestas.votos FROM subtemas, propuestas, usuarios WHERE subtemas.idusuario=usuarios.id and subtemas.idasamblea= '$idasamblea'";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['idasamblea'] . "</td>";
        echo "<td>" . $fila['idpropuesta'] . "</td>";        
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['descripcion'] . "</td>";
        echo "<td>" . $fila['votos'] . "</td>";
        echo "<td>";
        echo "<form action='votar.php?id=$id' method='post'>";
        echo "<input type='hidden' name='idpropuesta' value='" . $fila['idpropuesta'] . "'>";
        echo "<input type='hidden' name='idasamblea' value='" . $fila['idasamblea'] . "'>";
        echo "<input type='submit' name='votar' value='Votar'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    // Si no se encontraron propuestas, mostrar un mensaje en la primera fila de la tabla
    echo "<tr><td colspan='5'>No se encontraron propuestas.</td></tr>";
}
?>