<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Obtener la palabra clave de la URL
$palabra = $_GET['palabra'];

// Consulta SQL para buscar en la base de datos con la palabra clave
$query = "SELECT * FROM registros WHERE nombre LIKE '%$palabra%' OR genero LIKE '%$palabra%' OR año LIKE '%$palabra%' OR director LIKE '%$palabra%' OR plataforma LIKE '%$palabra%'";

// Ejecutar consulta
$result = $db->query($query);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    echo "<ul>";
    // Iterar sobre los resultados y mostrarlos
    while ($row = $result->fetch_assoc()) {
        // Resaltar la palabra clave en negrita
        $nombre_resaltado = str_replace($palabra, "<strong>$palabra</strong>", $row['nombre']);
        $genero_resaltado = str_replace($palabra, "<strong>$palabra</strong>", $row['genero']);
        $año_resaltado = str_replace($palabra, "<strong>$palabra</strong>", $row['año']);
        $director_resaltado = str_replace($palabra, "<strong>$palabra</strong>", $row['director']);
        $plataforma_resaltado = str_replace($palabra, "<strong>$palabra</strong>", $row['plataforma']);

        // Mostrar los resultados con la palabra clave resaltada
        echo "<li>Nombre: $nombre_resaltado, Género: $genero_resaltado, Año: $año_resaltado, Director: $director_resaltado, Plataforma: $plataforma_resaltado</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No se encontraron resultados para la palabra clave: <strong>$palabra</strong></p>";
}
?>
