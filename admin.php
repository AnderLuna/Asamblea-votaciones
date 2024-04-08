<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="styles/admin.css">    
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

    <div class="form-container">
        <form id="form-reg" action="registros.php" method="post" class="form-group">
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

            <input id="btn-reg-us" type="submit" value="Registrar Usuario">
        </form>

        <div class="form-vert">
            <form action="registros_asambleas.php" method="post" class="form-group">
                <h1>Registro de Asambleas</h1>

                <label for="tema">Tema:</label>
                <input type="text" id="tema" name="tema" required>

                <label for="fecha">Fecha:</label>
                <input type="text" id="fecha" name="fecha" placeholder="YYYY-MM-DD" required>

                <input type="submit" value="Registrar Asamblea">
            </form>

            <form action="eliminar_asambleas.php" method="post" class="form-group">
                <h1>Eliminacion de Asambleas</h1>

                <label for="idasamblea">ID Asamblea:</label>
                <input type="text" id="idasamblea" name="idasamblea" required>

                <input type="submit" value="Borrar Asamblea">
            </form>

            <form action="actualizar_asambleas.php" method="post" class="form-group">
                <h1>Eliminacion de Asambleas</h1>

                <label for="idasamblea">ID Asamblea:</label>
                <input type="text" id="idasamblea" name="idasamblea" required>

                <label for="estado">Estado (Activa / Cerrada):</label>
                <input type="text" id="estado" name="estado" required>                

                <input type="submit" value="Actualizar Asamblea">
            </form>                 
        </div>     
    </div>        


    <div class="form-container" id="table-asamblea">
        <form class="form-group">
        <h2>Asambleas Registradas</h2>
        <table>
            <tr>
                <th>IdAsamblea</th>
                <th>Tema</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
        </form>
    </div>    

    <script> // Script de JavaScript para que solo permita escribir numeros en los campos ID y edad.
    document.addEventListener('DOMContentLoaded', function() {
        var idInput = document.getElementById('id');
        var edadInput = document.getElementById('edad');
        
        idInput.addEventListener('input', function(event) {
            // Reemplaza cualquier carácter que no sea un número con una cadena vacía
            this.value = this.value.replace(/\D/g, '');
        });
        
        edadInput.addEventListener('input', function(event) {
            // Reemplaza cualquier carácter que no sea un número con una cadena vacía
            this.value = this.value.replace(/\D/g, '');
        });
    });
    </script>

</body>
</html>