<?php
// Conectar con la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db = "comentarios";
$conn = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");

// Recibir datos del formulario
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$comentario = $_POST["comentario"];
$valoracion = $_POST["valoracion"];

// Insertar comentario y valoración en la base de datos
$sql = "INSERT INTO comentarios (nombre, email, comentario, valoracion, fecha) VALUES ('$nombre', '$email', '$comentario', $valoracion, NOW())";
mysqli_query($conn, $sql) or die("Error al insertar el comentario");

// Consultar la tabla comentarios y ordenarlos por fecha descendente
$sql = "SELECT * FROM comentarios ORDER BY fecha DESC";
$result = mysqli_query($conn, $sql) or die("Error al consultar los comentarios");

// Calcular la media de las valoraciones
$sql_media = "SELECT AVG(valoracion) AS media FROM comentarios";
$result_media = mysqli_query($conn, $sql_media) or die("Error al calcular la media");
$row_media = mysqli_fetch_assoc($result_media);
$media = round($row_media["media"], 2);

// Mostrar los comentarios en una lista ordenada junto con la media de valoraciones
while ($row = mysqli_fetch_assoc($result)) {
    // Obtener los datos de cada comentario
    $nombre = $row["nombre"];
    $email = $row["email"];
    $comentario = $row["comentario"];
    $fecha = $row["fecha"];
    $valoracion = $row["valoracion"];

    // Mostrar el comentario con el nombre, el email, la fecha y la valoración
    echo "<li><strong>$nombre ($email)</strong> dijo el $fecha: $comentario - Valoración: $valoracion estrellas</li>";
}

// Mostrar la media de las valoraciones
echo "<p>Media de valoraciones: $media estrellas</p>";

// Cerrar la conexión con la base de datos
mysqli_close($conn);
?>