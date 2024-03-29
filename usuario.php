
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            border: ridge;
            background-color: #fff;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
        }

        .container h2 {
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group textarea {
            margin-bottom: 30px;
            width: 94%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius:30px;
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>
    <?php
        // Recoger los datos del usuario de la URL
        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
    ?>
    <h1>Bienvenido, <?php echo $id . ' - ' . $nombre . ' - ' . $apellido; ?> </h1>
    <div class="container">
        <h2>Registro de Propuestas</h2>
        <form action="registrar_propuesta.php" method="post" class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="titulo">Título de la Propuesta:</label>
            <input type="text" id="titulo" name="titulo" required>
            <label for="descripcion">Descripción de la Propuesta:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            <input type="submit" value="Registrar Propuesta">
        </form>
    </div>

    <div class="container">

        <h2>Visualización de Propuestas</h2>
        <form class="form-group">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Votos</th>
            </tr>
                <?php include 'visualizacion_propuesta.php'; ?>
        </table>
    </form>
    </div>

    <div class="container">
        <h2>Actualización de Propuesta</h2>
        <form class="form-group">
            <table>
                <tr>
                    <th>Titulo</th>
                    <th>Descripción</th>
                </tr>
                    <?php include 'editar_propuesta.php'; ?>
            </table>
            <input type="submit" value="Actualizar Propuesta">
        </form>
    </div>

    <div class="container">
        <h2>Eliminación de Propuesta</h2>
        <form action="eliminar_propuesta.php" method="post" class="form-group">
            <label for="id_eliminar">ID de la Propuesta a Eliminar:</label>
            <input type="text" id="id_eliminar" name="id_eliminar" required>
            <input type="submit" value="Eliminar Propuesta">
        </form>
    </div>
</body>
</html>