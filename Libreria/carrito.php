<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if (isset($_POST['agregar'])) {
    $idLibro = $_POST['id'];
    $_SESSION['carrito'][] = $idLibro;
}

$conexion = new mysqli("localhost", "root", "", "librerira");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
    <link rel="stylesheet" type="text/css" href="css/carrito.css">
</head>
<body>

    <header>
        <h1>🛒 Tu Carrito</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="catalogo.php">Catálogo</a>
            <a href="carrito.php">Carrito</a>
            <a href="login.php">Iniciar sesión</a>
            <a href="registro.php">Registrarse</a>
        </nav>
    </header>

    <?php
    $total = 0;
    if (empty($_SESSION['carrito'])) {
        echo "<p class='mensaje'>El carrito está vacío.</p>";
    } else {
        echo "<table>";
        echo "<tr><th>Título</th><th>Precio</th></tr>";
        foreach ($_SESSION['carrito'] as $idLibro) {
            $resultado = $conexion->query("SELECT * FROM libros WHERE id = $idLibro");
            if ($libro = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $libro['titulo'] . "</td>";
                echo "<td>$" . $libro['precio'] . "</td>";
                echo "</tr>";
                $total += $libro['precio'];
            }
        }
        echo "</table>";
        echo "<h3>Total a pagar: $$total</h3>";
    }
    ?>

</body>
</html>
