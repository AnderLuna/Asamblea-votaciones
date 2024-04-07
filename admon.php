s<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Panel de Administrador</title>    

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

        form {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            margin: 0 auto;
        }

        label {
            margin-bottom: 8px;
            display: block;
        }

        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group textarea {
            padding: 10px;
            margin-bottom: 20px;
            margin-right: 5px;
            border: 1px solid #ccc;
            border-radius: 30px;
            width: calc(100% - 25px);
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .container ul {
            list-style-type: none;
            padding: 0;
            text-align: justify;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .container ul li {
            display: inline-block;
            margin-right: 10px;
        }

        .container ul li a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            background-color: #f2f2f2;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .container ul li a:hover {
            background-color: #ccc;
        }     

        .encabezado {
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
            padding: 15px 20px;
            border-radius: 50%;
            background-color: #f2f2f2;
            font-weight: bold;
            font-style: italic;
        }

        .encabezado span {
            color: #007bff; 
            font-weight: bold; 
            font-style: italic;
        }   

        .container {
            border: ridge;
            background-color: #fff;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
        }       

        #sesion {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 0px;  
        }

        .form-container {
            display: flex;
            margin-top: 30px;
        }

        .form-container form {
            width: 45%; 
        }        
    </style> 
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
        <form action="registros.php" method="post" class="form-group">
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

        <form action="registros_asambleas.php" method="post" class="form-group">
            <h1>Registro de Asambleas</h1>
            <label for="asamblea_id">ID de Asamblea:</label>
            <input type="text" id="asamblea_id" name="asamblea_id" required>

            <label for="fecha">Fecha:</label>
            <input type="text" id="fecha" name="fecha" placeholder="YYYY-MM-DD" required>

            <label for="hora">Hora:</label>
            <input type="text" id="hora" name="hora" placeholder="HH:MM" required>

            <label for="lugar">Lugar:</label>
            <input type="text" id="lugar" name="lugar" required>

            <label for="tema">Tema:</label>
            <input type="text" id="tema" name="tema" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

            <input type="submit" value="Registrar Asamblea">
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