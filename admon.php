<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/admon.css">  
    <title>Panel de Administrador</title>
</head>

<body>

    <div class="container">
        <h2 id='sesion'>PANEL DE ADMINISTRADOR</h2>
        <?php include 'encabezado.php'; ?>
        <h2>Menú</h2>
        <ul>
            <li><a href="actualizar_datos.php?id=<?php echo $id; ?>">Actualizar datos</a></li>
            <li><a href="votaciones.php?id=<?php echo $id; ?>">Votaciones</a></li>
        </ul>
    </div>

    <form action="registros.php" method="post">
        <h1>Registro de Usuarios</h1>
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="edad">Edad:</label>
        <input type="text" id="edad" name="edad" required>

        <label for="cargo">Cargo:</label>
        <input type="text" id="cargo" name="cargo" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Registrar Usuario">
    </form>

    <script> // Script de JavaScript para que solo permita escribir numeros en los campos ID y edad.
    document.addEventListener('DOMContentLoaded', function() {
        var idInput = document.getElementById('id');
        idInput.addEventListener('input', function(event) {
            // Reemplaza cualquier carácter que no sea un número con una cadena vacía
            this.value = this.value.replace(/\D/g, '');
            });
            var edadInput = document.getElementById('edad');
            edadInput.addEventListener('input', function(event) {
                // Reemplaza cualquier carácter que no sea un número con una cadena vacía
                this.value = this.value.replace(/\D/g, '');
            });
        });
    </script>
</body>
</html>
