<?php
// Configuración de correo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    
    // Validación simple de campos
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        echo "Por favor, completa todos los campos obligatorios.";
    } else {
        // Aquí se configuraría el correo. Como ejemplo se enviará a tu correo.
        $to = "tu-correo@dominio.com"; // Reemplaza con tu correo
        $subject = "Nuevo mensaje de contacto";
        $body = "Nombre: $nombre\nEmail: $email\nAsunto: $asunto\n\nMensaje:\n$mensaje";
        $headers = "From: $email";

        // Enviar correo
        if (mail($to, $subject, $body, $headers)) {
            echo "Gracias por tu mensaje. Te responderemos a la brevedad.";
        } else {
            echo "Hubo un problema al enviar tu mensaje. Intenta nuevamente.";
        }
    }
}
?>







