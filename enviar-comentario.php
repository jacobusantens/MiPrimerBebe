<?php
      // Conectar con la base de datos
      $host = "localhost";
      $user = "root";
      $pass = "";
      $db = "comentarios";
      $conn = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar con la base de datos");
  
      // Consultar la tabla comentarios y ordenarlos por fecha descendente
      $sql = "SELECT * FROM comentarios ORDER BY fecha DESC";
      $result = mysqli_query($conn, $sql) or die("Error al consultar los comentarios");
  
      // Mostrar los comentarios en una lista ordenada
      while ($row = mysqli_fetch_assoc($result)) {
        // Obtener los datos de cada comentario
        $nombre = $row["nombre"];
        $email = $row["email"];
        $comentario = $row["comentario"];
        $fecha = $row["fecha"];
  
        // Mostrar el comentario con el nombre, el email y la fecha
        echo "<li><strong>$nombre ($email)</strong> dijo el $fecha:<br>$comentario</li>";
      }
  
      // Cerrar la conexión con la base de datos
      mysqli_close($conn);
      ?>