// Archivo txt
usuario,password,nombre_completo,direccion,cp,localidad,telefono,correo,avatar
juan,pwd123,Juan Pérez,123/Calle Falsa/1/A,28001,Madrid,612345678,juan@example.com,juan_avatar.png
maria,secret,María López,456/Av. Siempreviva/2/B,28002,Madrid,672345678,maria@example.com,maria_avatar.png

// login.php
<?php
session_start();

// Función para autenticar al usuario
function autenticarUsuario($usuario, $password) {
    $archivo = fopen("clientes.txt", "r");
    
    if ($archivo) {
        while (($linea = fgetcsv($archivo)) !== false) {
            list($usuarioCSV, $passwordCSV, $nombre_completo, $direccion, $cp, $localidad, $telefono, $correo, $avatar) = $linea;
            
            // Verifica si el usuario y contraseña coinciden
            if ($usuario === $usuarioCSV && $password === $passwordCSV) {
                // Guarda la información en la sesión
                $_SESSION['usuario'] = $usuario;
                $_SESSION['nombre_completo'] = $nombre_completo;
                $_SESSION['avatar'] = $avatar;
                fclose($archivo);
                return true;
            }
        }
        fclose($archivo);
    }
    return false;
}

// Procesa el inicio de sesión
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if (autenticarUsuario($usuario, $password)) {
        header("Location: login.php"); // Recarga la página para mostrar la sesión activa
        exit;
    } else {
        $error = "Nombre de usuario o contraseña incorrectos.";
    }
}

// Cierra sesión
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Kebab - Inicio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Restaurante Kebab</h1>
    </header>

    <nav>
        <ul>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a href="generar_pedido.php">Generar Pedido</a></li>
            <li><a href="gestion_carta.php">Gestión de Carta</a></li>
            <li><a href="mejores_clientes.php">Mejores Clientes</a></li>
        </ul>
    </nav>

    <main>
        <?php if (isset($_SESSION['usuario'])): ?>
            <!-- Usuario autenticado: muestra nombre y avatar -->
            <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre_completo']); ?></h2>
            <img src="avatars/<?php echo htmlspecialchars($_SESSION['avatar']); ?>" alt="Avatar" width="100" height="100">
            <p><a href="?logout=true">Cerrar sesión</a></p>
        <?php else: ?>
            <!-- Formulario de inicio de sesión -->
            <h2>Inicie sesión para continuar</h2>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="login.php" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
                <br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <button type="submit">Iniciar sesión</button>
            </form>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Restaurante Kebab. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

