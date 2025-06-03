<?php
if (isset($_POST['registrar'])) {
    $conexion = new mysqli("localhost", "root", "", "librerira");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conexion->query("INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')");

    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="css/registro.css">
</head>
<body>

    <div class="container">
        <h1>Registrarse</h1>
        <form method="post">
            <input type="text" name="nombre" placeholder="Nombre completo" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="submit" name="registrar" value="Registrarse">
        </form>
    </div>

</body>
</html>
