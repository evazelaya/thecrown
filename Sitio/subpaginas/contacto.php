<?php
// Procesamos el formulario si se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Validar que el email sea válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Por favor, ingresa un correo electrónico válido.";
    } else {
        // Aquí puedes agregar el código para enviar el correo electrónico
        $asunto = "Nuevo mensaje de contacto";
        $cuerpo = "Nombre: $nombre\nCorreo: $email\nMensaje: $mensaje";
        $cabeceras = "From: $email";

        if (mail("tuemail@dominio.com", $asunto, $cuerpo, $cabeceras)) {
            $exito = "Mensaje enviado con éxito. Nos pondremos en contacto contigo pronto.";
        } else {
            $error = "Hubo un problema al enviar el mensaje. Intenta de nuevo más tarde.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="../css/contacto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

<!-- ENCABEZADO CON MENÚ (idéntico al de historia) -->
<header>
    <div class="encabezado">
        <h1 class="titulo-header">The Crown</h1>
        <nav class="menu">
            <ul>
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="historia.html">Historia</a></li>
                <li><a href="personajes.html">Personajes</a></li>
                <li><a href="episodioclave.html">Episodios Clave</a></li>
                <li><a href="galeria.html">Galería</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
        </nav>
        <div class="buscador-login">
            <!-- Buscador -->
            <div class="buscador">
                <input type="text" placeholder="Buscar..." />
            </div>
            <!-- Botón de Login -->
            <div class="login-btn">
                <a href="login.html" class="btn-login">Iniciar sesión</a>
            </div>
        </div>
    </div>
</header>

<!-- FORMULARIO DE CONTACTO -->
<div class="contacto-form">
    <h2>Formulario de Contacto</h2>
    <p>¡Escríbenos y estaremos en contacto contigo lo antes posible!</p>

    <?php if (isset($exito)) { echo "<p>$exito</p>"; } ?>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>

    <form action="contacto.php" method="POST">
        <label for="nombre">Tu nombre</label>
        <input type="text" name="nombre" required placeholder="Escribe tu nombre">

        <label for="email">Tu e-mail</label>
        <input type="email" name="email" required placeholder="Escribe tu correo electrónico">

        <label for="mensaje">Tu mensaje</label>
        <textarea name="mensaje" required placeholder="Escribe tu mensaje aquí"></textarea>

        <button type="submit">Enviar</button>
    </form>
</div>

<!-- PIE DE PÁGINA (idéntico al de historia) -->
<footer>
    <div class="footer-contenido">
        <p class="suscribite">Suscríbete para recibir todas las novedades</p>
        <div class="redes">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
        </div>
    </div>
</footer>

</body>
</html>




























