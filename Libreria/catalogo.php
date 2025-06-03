<?php
// Conexión a la base de datos librerira
$conexion = new mysqli("localhost", "root", "", "librerira");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM libros");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Catálogo de Libros</title>
    <link rel="stylesheet" type="text/css" href="css/catalogo.css">
</head>
<body>

    <h1>Catálogo de Libros</h1>
    <a href="carrito.php">Ver carrito</a>
    <hr>

    <div class="catalogo">
        <?php while ($libro = $resultado->fetch_assoc()): ?>
            <div class="libro">
                <img src="img/<?php echo $libro['imagen']; ?>" alt="<?php echo $libro['titulo']; ?>">
                <h2><?php echo $libro['titulo']; ?></h2>
                <p>Autor: <?php echo $libro['autor']; ?></p>
                <p>Precio: $<?php echo $libro['precio']; ?></p>
                <form method="post" action="carrito.php">
                    <input type="hidden" name="id" value="<?php echo $libro['id']; ?>">
                    <input type="submit" name="agregar" value="Agregar al carrito">
                </form>
            </div>
        <?php endwhile; ?>
    </div>

</body>
</html>
