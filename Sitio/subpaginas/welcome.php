<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está logueado
if (!isset($_SESSION['user'])) {
    header("Location: login.html"); // Si no está logueado, redirigir al login
    exit();
}

echo "¡Bienvenido, " . $_SESSION['user'] . "!"; // Mostrar el nombre del usuario
?>






























