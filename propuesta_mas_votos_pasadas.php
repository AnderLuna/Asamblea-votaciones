<?php
//Modulo que permite ver propuesta ganadora o con más votos de las asambleas pasadas 

//Hacemos la conexión con la base de datos
require_once 'database.php'; 
//Obtener propuestas de la base de datos 
$conexion=Database::obtenerConexion(); 
//Consulta SQL para obtener las propuestas con mas votos de asambleas pasadas 
$query = "SELECT p.idpropuesta, p.titulo, p.descripcion, p.votos FROM propuestas p INNER JOIN (SELECT idpropuesta, COUNT(idvotante) AS total_votos FROM votaciones GROUP BY idpropuesta) AS v ON p.idpropuesta = v.idpropuesta ORDER BY v.total_votos DESC LIMIT 1"; 

$resultado = $conexion->query($query); 

//Verificar si se encontraron resultados 

if($resultados->num_rows > 0){
    //Mostrar los datos en la tabla 
    while ($fila = $resultado->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $fila['idpropuesta'] . "</td>";
        echo "<td>" . $fila['titulo'] . "</td>";
        echo "<td>" . $fila['descripcion'] . "</td>";
        echo "<td>" . $fila['votos'] . "</td>";
        echo "</tr>";
    }
} else {
    //Si no se encuentran propuestas se muestra en la primera fila de la tabla que los resultados no fueron encontrados
    echo "<tr><td colspan='5'>No se encontraron propuestas.</td></tr>";
}

//Cerramos conexion 
$conexion->close(); 

?>