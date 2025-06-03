<?php
session_start();

if (isset($_POST['login'])) {
    $conexion = new mysqli("localhost", "root", "", "librerira");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $resultado = $conexion->query("SELECT * FROM usuarios WHERE email = '$email'");

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $usuario['nombre'];
            header("Location: index.php");
            exit;
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

    <div class="container">
        <h1>Iniciar sesión</h1>

        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

        <form method="post">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="submit" name="login" value="Iniciar sesión">
        </form>
    </div>

</body>
</html>
