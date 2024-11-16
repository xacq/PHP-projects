<?php 
session_start();

// Validar si el cliente está logueado
if (!isset($_SESSION['usuario'])) {
  echo("<a href='./login.php'>Ir a Inicio</a>");
  exit();
}
else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<nav>
  <div class="-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="perfil.php">Perfil</a>
        </li>
        <?php if ($_SESSION['aprobado'] == 1){ ?>
          <li class="nav-item">
            <a class="nav-link" href="generar_pedido.php">Generar Pedido</a>
          </li>
          <?php if ($_SESSION['usuario'] == 'moncloa'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="gestion_carta.php">Gestion de Carta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mejores_clientes.php">Mejores Clientes</a>
          </li>
          <?php }?>

        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php" aria-disabled="true">Salir</a>
        </li>
      </ul>

    </div>
  </div>
</nav>

<?php
echo '<pre>';
print_r($_SESSION); 
echo '</pre>';

          }
?>
