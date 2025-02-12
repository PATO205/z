<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
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

    // Calcular IMC
    $imc = $peso / ($talla * $talla);

    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'mineria');
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar datos en la tabla
    $sql = "INSERT INTO alumnos (nombre, sexo, semestre, grupo, ta, temperatura, fc, fr, saturacion, peso, talla, imc)
            VALUES ('$nombre', '$sexo', '$semestre', '$grupo', '$ta', '$temperatura', '$fc', '$fr', '$saturacion', '$peso', '$talla', '$imc')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente.";
        window.location:formulario.html;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
