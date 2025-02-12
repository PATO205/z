<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .table-container {
            max-width: 900px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .no-results {
            text-align: center;
            color: #666;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'mineria');
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if (isset($_GET['nombre'])) {
        $nombre = $conn->real_escape_string($_GET['nombre']); // Escapar el nombre para evitar inyecciones SQL

        // Consulta para buscar por nombre
        $sql = "SELECT * FROM alumnos WHERE nombre LIKE '%$nombre%'";
        $result = $conn->query($sql);

        echo '<div class="table-container">';
        if ($result->num_rows > 0) {
            echo '<h2>Resultados para "' . htmlspecialchars($nombre) . '"</h2>';
            echo '<table>';
            echo '<tr>
            <th>NC</th>
                    <th>Nombre</th>
                    <th>Sexo</th>
                    <th>Semestre</th>
                    <th>Grupo</th>
                    <th>TA</th>
                    <th>Temperatura</th>
                    <th>FC</th>
                    <th>FR</th>
                    <th>Saturación</th>
                    <th>Peso</th>
                    <th>Talla</th>
                    <th>IMC</th>
                  </tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                <td>' . htmlspecialchars($row['nc']) . '</td>
                        <td>' . htmlspecialchars($row['nombre']) . '</td>
                        <td>' . htmlspecialchars($row['sexo']) . '</td>
                        <td>' . htmlspecialchars($row['semestre']) . '</td>
                        <td>' . htmlspecialchars($row['grupo']) . '</td>
                        <td>' . htmlspecialchars($row['ta']) . '</td>
                        <td>' . htmlspecialchars($row['temperatura']) . '</td>
                        <td>' . htmlspecialchars($row['fc']) . '</td>
                        <td>' . htmlspecialchars($row['fr']) . '</td>
                        <td>' . htmlspecialchars($row['saturacion']) . '</td>
                        <td>' . htmlspecialchars($row['peso']) . '</td>
                        <td>' . htmlspecialchars($row['talla']) . '</td>
                        <td>' . htmlspecialchars($row['imc']) . '</td>
                      </tr>';
            }
            echo '</table>';
        } else {
            echo '<div class="no-results"><h2>No se encontraron resultados para "' . htmlspecialchars($nombre) . '".</h2></div>';
        }
        echo '</div>';
    }

    $conn->close();
    ?>
</body>
</html>
