<?php
session_start(); // Iniciar la sesión
session_destroy(); // Destruir la sesión
header("Location: login.html"); // Redirigir al login después de cerrar la sesión
exit();
?>































