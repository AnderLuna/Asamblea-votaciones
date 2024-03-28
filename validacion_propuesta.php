<?php
require_once 'database.php'; 

//Tareas  a realizar: Validar que la propuesta tenga 0 votos para poder ser modificada y
// validar que la descripción no sea vacía 

$conexion= Database::obtenerConexion(); 
//Obtenemos la conexion a la base de datos

$id_propuesta = $_POST['id_propuesta']; 
//Hacemos el query para hacer la operación en la base de datos
$sql= "SELECT descripcion, votos FROM propuestas WHERE id= $id_propuesta"; 
$resultado= $conexion->query($sql); 

if($resultado->num_rows >0){
    $fila=$resultado->fetch_assoc(); 
    $descripcion=$fila['descripcion']; 
    $votos=$fila['votos']; 
    $validar=false; 

    if ($votos==0){
        //Verificamos que la descripción no esté vacia 
        if(!empty($descripcion)){
            echo "La propuesta puede ser modificada"; 
            $validar=true 
        }else{
            echo "La descripción de la propuesta está vacia y deber ser llenada para poder ser modificada "; 
        }
    }else{
        echo"La propuesta no puede ser modificada puesto que ya tiene votos";  
    }
}else{
    echo"No se encontro la propuesta con el ID proporcionado";
}



//Cerramos la conexion con base de datos
$conexion->close(); 




























?>