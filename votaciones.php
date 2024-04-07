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
        <h2>Votaciones Actuales</h2>
        <form>

        </form>
    </div>

    <div class="container">

        <h2>Votaciones pasadas</h2>
        <form class="form-group">
        <table>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Votos</th>
            </tr>
                <?php include 'visualizacion_votaciones_pasadas.php'; ?>
        </table>
        </form>

    </div>

    <div class="container">
        <h2>propuestas mas votadas</h2>
        <form action="propuesta_mas_votos_pasadas.php" method="post" class="form-group">
        </form>
    </div>

  
</body>
</html>