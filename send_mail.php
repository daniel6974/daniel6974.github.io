<?php
// CONFIGURACIÓN
$destinatario = "danielcarrizo74@gmail.com"; // Cambiar por tu correo real
$asunto = "Nuevo mensaje desde el formulario de contacto";

// OBTENER DATOS
$nombre   = $_POST['nombre'] ?? '';
$email    = $_POST['email'] ?? '';
$servicio = $_POST['servicio'] ?? '';
$mensaje  = $_POST['mensaje'] ?? '';

// VALIDACIÓN
if (!$nombre || !$email || !$mensaje) {
    die("Error: Faltan datos obligatorios.");
}

// CUERPO DEL MENSAJE
$contenido = "
Nuevo mensaje desde la web:

Nombre: $nombre
Email: $email
Servicio de interés: $servicio

Mensaje:
$mensaje
";

// CABECERAS
$headers = "From: $nombre <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// ENVIAR
if (mail($destinatario, $asunto, $contenido, $headers)) {
    header("Location: index.html?enviado=1");
    exit;
} else {
    echo "<h2>Error al enviar el mensaje.</h2><p>Intentá nuevamente más tarde.</p>";
}
?>