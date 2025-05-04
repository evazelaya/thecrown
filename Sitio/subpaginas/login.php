<?php
// Iniciar sesión
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";  // Cambiar si usas otro nombre de usuario en tu MySQL
$password = "";  // Cambiar si usas otra contraseña
$dbname = "proyecto";  // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario de login fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM usuario WHERE EMAIL = '$email' AND CONTRASEÑA = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si las credenciales son correctas
        $row = $result->fetch_assoc();
        // Guardar el nombre de usuario en la sesión
        $_SESSION['usuario'] = $row['NOMEUSER'];
        
        // Redirigir al index
        header("Location: http://localhost/TheCrown/Sitio/index.html");
        exit();
    } else {
        // Si las credenciales no son correctas
        echo "Correo o contraseña incorrectos.";
    }
}

$conn->close();
?>

<!-- HTML para el formulario de login -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>

<h2>Iniciar sesión</h2>

<form method="POST" action="login.php">
    <label for="email">Correo electrónico:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Contraseña:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Iniciar sesión">
</form>

</body>
</html>

































