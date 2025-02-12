<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #c0392b;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
        .success {
            color: #2ecc71;
        }
        .error {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Eliminar Registro</h2>
        <form action="eliminar.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre" required>
            <button type="submit">Eliminar</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Conexión a la base de datos
        $conn = new mysqli('localhost', 'root', '', 'mineria');
        if ($conn->connect_error) {
            die("<div class='message error'>Conexión fallida: " . $conn->connect_error . "</div>");
        }

        // Obtener el nombre del formulario
        $nombre = $conn->real_escape_string($_POST['nombre']);

        // Consulta para eliminar registros
        $sql = "DELETE FROM alumnos WHERE nombre = '$nombre'";
        if ($conn->query($sql) === TRUE) {
            if ($conn->affected_rows > 0) {
                echo "<div class='message success'>El registro con el nombre '$nombre' ha sido eliminado exitosamente.</div>";
            } else {
                echo "<div class='message error'>No se encontró ningún registro con el nombre '$nombre'.</div>";
            }
        } else {
            echo "<div class='message error'>Error al eliminar el registro: " . $conn->error . "</div>";
        }

        $conn->close();
    }
    ?>
</body>
</html>
