<?php
    require_once 'database.php';

    // Recoger los datos del usuario de la URL
    $id = $_GET['id'];
    $conexion = Database::obtenerConexion();

    // Consulta SQL para buscar al usuario en la base de datos
    $query = "SELECT tema FROM asambleas WHERE estado='activa'";

    // Ejecutar la consulta
    $resultado = $conexion->query($query);

    // Verificar si se encontró algún resultado
    if ($resultado->num_rows > 0) {        

        $data = $resultado->fetch_assoc();
        $tema=$data['tema'];

        echo "<div class='encabezado'>TEMA DE LA ASAMBLEA:, <span>$tema</span></div>";



    }     

    
?>