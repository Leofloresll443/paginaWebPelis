<?php
// Conexión a la base de datos (reemplaza los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los valores del formulario
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$año = $_POST['año'];
$director = $_POST['director'];
$plataforma = $_POST['plataforma'];

// Preparar la consulta SQL
$sql = "INSERT INTO registros (nombre, genero, año, director, plataforma)
VALUES ('$nombre', '$genero', '$año', '$director', '$plataforma')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
  echo "La película se registró correctamente";
} else {
  echo "Error al registrar la película: " . $conn->error;
}

// Cerrar la conexión
$conn->close();

// Redirigir a una página de confirmación
header("Location: confirmacion.html");
exit(); // Asegura que el script se detenga aquí
?>
