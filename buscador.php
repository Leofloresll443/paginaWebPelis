<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';

if (!empty($_POST['palabra'])) {
    // Obtener la palabra clave ingresada por el usuario
    $palabra = $_POST['palabra'];

    // Consulta SQL para buscar en la base de datos
    $query = "SELECT * FROM registros WHERE nombre LIKE '%$palabra%' OR genero LIKE '%$palabra%' OR año LIKE '%$palabra%' OR director LIKE '%$palabra%' OR plataforma LIKE '%$palabra%'";

    // Ejecutar consulta
    $result = $db->query($query);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Redireccionar a mostrar.php si se encuentran resultados
        header("Location: mostrar.php");
        exit(); // Asegurarse de que el script se detenga después de redirigir
    } else {
        echo "<p>No se encontraron resultados para la palabra clave: $palabra</p>";
    }
} else {
    echo "<p>Por favor ingrese una palabra clave para buscar.</p>";
}
?>
