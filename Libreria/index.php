<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mi Tienda de Libros</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

    <header>
        <h1>📚 Mi Tienda de Libros</h1>
        <nav>
            <a href="catalogo.php">Catálogo</a>

            <?php if (isset($_SESSION['usuario'])): ?>
                <a href="carrito.php">Carrito</a>
                <span class="usuario">👤 <?php echo $_SESSION['usuario']; ?></span>
                <a href="logout.php">Cerrar sesión</a>
            <?php else: ?>
                <a href="login.php">Iniciar sesión</a>
                <a href="registro.php">Registrarse</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <div class="bienvenida">
            <h2>Bienvenido a la mejor tienda de libros en línea</h2>
            <p>Descubre una gran variedad de títulos para todos los gustos. 📚</p>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 Mi Tienda de Libros. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
