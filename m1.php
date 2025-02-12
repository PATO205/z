<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Opciones</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        /* General */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f8ff; /* Fondo color azul claro */
    text-align: center;
}

/* Header */
.header {
    background-color: #00796b; /* Verde médico oscuro */
    padding: 20px;
}

.school-image {
    width: 100%;
    max-width: 600px;
    height: auto;
    border-radius: 10px;
}

/* Menú */
.menu-container {
    padding: 20px;
}

.menu-container h1 {
    color: #004d40; /* Verde oscuro */
    margin-bottom: 20px;
}

.menu {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.menu-item {
    background-color: #e0f2f1; /* Verde claro */
    border: 2px solid #00796b; /* Verde oscuro */
    border-radius: 10px;
    width: 150px;
    padding: 15px;
    text-align: center;
    transition: transform 0.3s, background-color 0.3s;
}

.menu-item:hover {
    background-color: #004d40; /* Verde más oscuro */
    transform: scale(1.1);
}

.menu-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 10px;
}

.menu-item a {
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    color: #00796b;
}

.menu-item a:hover {
    color: #ffffff; /* Cambia a blanco al pasar el mouse */
}

    </style>
    <!-- Imagen de la escuela -->
    <header class="header">
        <img src="escuela.png" alt="Imagen de la Escuela" class="school-image">
    </header>

    <!-- Menú de Opciones -->
    <div class="menu-container">
        <h1>Menú Principal</h1>
        <div class="menu">
            <!-- Insertar -->
            <div class="menu-item">
                <a href="formulario.html">Insertar</a>
            </div>

            <!-- Mostrar -->
            <div class="menu-item">
                <a href="buscar.html">Mostrar</a>
            </div>

            <!-- Eliminar -->
            <div class="menu-item">
                <a href="eliminar.php">Eliminar</a>
            </div>

            <!-- Actualizar -->
            <div class="menu-item">
                <a href="act.php">Actualizar</a>
            </div>
        </div>
    </div>
</body>
</html>
