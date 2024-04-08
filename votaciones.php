<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/usuario.css">
    <title>Panel de Votaciones</title>
    
</head>
<body>

    <div class="container">
        <?php include 'encabezado.php'; ?>
        <h2>Menú</h2>
        <ul>
            <li><a href="actualizar_datos.php?id=<?php echo $id; ?>">Actualizar datos</a></li>
            <li><a href="usuario.php?id=<?php echo $id; ?>">Propuestas</a></li>

        </ul>
    </div>

    <div class="container">
        <h2>Propuestas con mas votos de la asamblea actual</h2>
        <form class="form-group">
        <table>
            <tr>
                <th>IdAsamblea</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Votos</th>
            </tr>
        </table>
        </form>
    </div>

    <div class="container">

        <h2>Propuestas Activas</h2>
        <form class="form-group">
        <table>
            <tr>
                <th>IdAsamblea</th>
                <th>IdPropuesta</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Votos</th>
                <th>Estado</th>
            </tr>
        </table>
        </form>

    </div>

    <div class="container">
        <h2>Mis Votaciones</h2>
        <form class="form-group">
        <table>
            <tr>
                <th>IdAsamblea</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
            </tr>
        </table>
        </form>
    </div>

    <br><br><br><br><br><br><br>
    <h2>RESULTADOS DE PROPUESTAS DE ASAMBLEAS FINALIZADAS</h2>

    <div class="container">
        <h2>Asambleas Pasadas</h2>
        <form class="form-group">
        <table>
            <tr>
                <th>IdAsamblea</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Votos</th>
                <th>Estado</th>
            </tr>
        </table>
        </form>
    </div>    

    <div class="container">
        <h2>Propuestas Ganadoras</h2>
        <form class="form-group">
        <table>
            <tr>
                <th>IdAsamblea</th>
                <th>IdPropuesta</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Votos</th>
                <th>Estado</th>
            </tr>
        </table>
        </form>
    </div>    
  
</body>
</html>