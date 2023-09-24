<?php
// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$seccion = $_POST['seccion'];
$comentario = $_POST['comentario'];
$suscripcion = $_POST['suscripcion'];

// Validar los datos
if (empty($nombre) || empty($email)) {
  // Mostrar un mensaje de error si faltan datos obligatorios
  echo "Por favor, rellena los campos nombre y email.";
} else {
  // Enviar los datos por correo electrónico
  $destinatario = "llanvicom@gmail.com"; // El email de tu página web
  $asunto = "Nuevo mensaje de contacto"; // El asunto del correo
  $mensaje = "Has recibido un nuevo mensaje de contacto de $nombre ($email).\n";
  $mensaje .= "Teléfono: $telefono\n";
  $mensaje .= "Sección de interés: $seccion\n";
  $mensaje .= "Comentario: $comentario\n";
  if ($suscripcion == "si") {
    $mensaje .= "$nombre también quiere suscribirse a tu boletín.\n";
  }
  $cabeceras = "From: $email"; // El remitente del correo
  // Usar la función mail() de PHP para enviar el correo
  $enviado = mail($destinatario, $asunto, $mensaje, $cabeceras);
  if ($enviado) {
    // Mostrar un mensaje de éxito si el correo se envió correctamente
    echo "Gracias por tu mensaje, $nombre. Te responderemos lo antes posible.";
  } else {
    // Mostrar un mensaje de error si el correo no se pudo enviar
    echo "Lo sentimos, hubo un problema al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.";
  }
}
?>