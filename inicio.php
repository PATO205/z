<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Web</title>
    <link rel="stylesheet" href="estilos1.css">
</head>
<body>
    <!-- Menú -->
    <nav class="menu">
        <ul>
            <li><a href="Mineria de Datos.pdf">Calculo</a></li>
            <li><a href="cuidado de la salud.pdf">Ciencias</a></li>
            <li><a href="ingles.jpg">Ingles</a></li>
            <li><a href="fisica.html">FIsica</a></li>
        </ul>
    </nav>

    <!-- Texto -->
    <div class="content">
        <p>
        La minería de datos es el proceso de analizar grandes conjuntos de datos para descubrir patrones, tendencias y relaciones ocultas. Esta técnica permite transformar datos en información valiosa para la toma de decisiones informadas.
        </p>
    </div>

    <!-- Formularios -->
    <div class="forms">
        <div class="form-container">
            <h2>Acceso para Alumnos</h2>
            <form action="v.php" method="POST">
                <label for="student-username">NOMBRE:</label>
                <input type="text" id="student-username" name="nom" required>

                <label for="student-password">NUMERO DE CONTROL:</label>
                <input type="text" id="student-password" name="nc" required>

                <button type="submit" name="student-login">Iniciar Sesión</button>
            </form>
        </div>

        <div class="form-container">
            <h2>Acceso para Administradores</h2>
            <form action="validar.php" method="POST">
                <label for="admin-username">Usuario:</label>
                <input type="text" name="user" required>

                <label for="admin-password">Contraseña:</label>
                <input type="password" name="contra" required>

                <button type="submit" name="admin-login">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
