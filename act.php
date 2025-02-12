<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
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
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #2980b9;
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
        <h2>Actualizar Registro</h2>

        <?php
        // Conexión a la base de datos
        $conn = new mysqli('localhost', 'root', '', 'mineria');
        if ($conn->connect_error) {
            die("<div class='message error'>Conexión fallida: " . $conn->connect_error . "</div>");
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Obtener el registro actual
            $sql = "SELECT * FROM alumnos WHERE id = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nombre = $row['nombre'];
                $sexo = $row['sexo'];
                $semestre = $row['semestre'];
                $grupo = $row['grupo'];
                $ta = $row['ta'];
                $temperatura = $row['temperatura'];
                $fc = $row['fc'];
                $fr = $row['fr'];
                $saturacion = $row['saturacion'];
                $peso = $row['peso'];
                $talla = $row['talla'];
                $imc = $row['imc'];
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los nuevos datos del formulario
        
            $nombre = $_POST['nombre'];
            $sexo = $_POST['sexo'];
            $semestre = $_POST['semestre'];
            $grupo = $_POST['grupo'];
            $ta = $_POST['ta'];
            $temperatura = $_POST['temperatura'];
            $fc = $_POST['fc'];
            $fr = $_POST['fr'];
            $saturacion = $_POST['saturacion'];
            $peso = $_POST['peso'];
            $talla = $_POST['talla'];

            // Asegurarse de que peso y talla sean números
            $peso = (float)$peso; // Convertir a float
            $talla = (float)$talla; // Convertir a float

            // Calcular el IMC (peso / talla^2)
            if ($talla > 0) {
                $imc = $peso / ($talla * $talla);
            } else {
                $imc = 0; // Para evitar la división por 0
            }

            // Actualizar el registro
            $sql = "UPDATE alumnos SET sexo='$sexo', semestre='$semestre', grupo='$grupo', ta='$ta', temperatura='$temperatura', fc='$fc', fr='$fr', saturacion='$saturacion', peso='$peso', talla='$talla', imc='$imc' WHERE nombre='$nombre'";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='message success'>Registro actualizado exitosamente.</div>";
            } else {
                echo "<div class='message error'>Error al actualizar el registro: " . $conn->error . "</div>";
            }
        }

        // Cerrar la conexión
        $conn->close();
        ?>

        <!-- Formulario de actualización -->
        <form action="act.php" method="POST">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>" >

            <label for="sexo">Sexo:</label>
            <input type="text" id="sexo" name="sexo" value="<?php echo isset($sexo) ? $sexo : ''; ?>" >

            <label for="semestre">Semestre:</label>
            <input type="number" id="semestre" name="semestre" value="<?php echo isset($semestre) ? $semestre : ''; ?>" >

            <label for="grupo">Grupo:</label>
            <input type="text" id="grupo" name="grupo" value="<?php echo isset($grupo) ? $grupo : ''; ?>" >

            <label for="ta">TA:</label>
            <input type="text" id="ta" name="ta" value="<?php echo isset($ta) ? $ta : ''; ?>" >

            <label for="temperatura">Temperatura:</label>
            <input type="number" id="temperatura" name="temperatura" value="<?php echo isset($temperatura) ? $temperatura : ''; ?>" >

            <label for="fc">FC:</label>
            <input type="number" id="fc" name="fc" value="<?php echo isset($fc) ? $fc : ''; ?>" >

            <label for="fr">FR:</label>
            <input type="number" id="fr" name="fr" value="<?php echo isset($fr) ? $fr : ''; ?>" >

            <label for="saturacion">Saturación:</label>
            <input type="number" id="saturacion" name="saturacion" value="<?php echo isset($saturacion) ? $saturacion : ''; ?>" >

            <label for="peso">Peso:</label>
            <input type="number" id="peso" name="peso" value="<?php echo isset($peso) ? $peso : ''; ?>" >

            <label for="talla">Talla:</label>
            <input type="number" id="talla" name="talla" value="<?php echo isset($talla) ? $talla : ''; ?>" >

            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
