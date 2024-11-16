<?php
include ('head.php');
include ('../Controlador/controlador_menu.php');

// Obtener la ID del plato desde la URL
$id = $_GET["id"]; // Asigna el valor a la variable $id
echo ($id);
$plato = null;
foreach ($menu as $item) {
  if ($item["id"] == $id) {
    $plato = $item;
    break;
  }
}

// Si no se encuentra el plato, mostrar un error
if (!$plato) {
  echo "Error: Plato no encontrado.";
  exit;
}

?>

?>


<div class=" text-center">
    <h1>Actualizar Plato</h1>
    <div class="row text-start">
        <form action="../Controlador/controlador_plato.php" method="POST">
            <div class=" col-sm-6 offset-sm-3">
                <input type="hidden" name="id" value="<?php echo $plato["id"]; ?>"> 

                <label for="category" class="form-label">Categoría:</label>
                <input type="text" id="category" name="category" class="form-control" value="<?php echo $plato["categoria"]; ?>">

                <label for="name" class="form-label">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $plato["nombre"]; ?>">

                <label for="price" class="form-label">Precio:</label>
                <input type="text" id="price" name="price" class="form-control" value="<?php echo $plato["precio"]; ?>">

                <label for="image" class="form-label">Imagen:</label>
                <input type="text" id="image" name="image" class="form-control" value="<?php echo $plato["imagen"]; ?>">

                <label for="allergens" class="form-label">Alérgenos:</label>
                <input type="text" id="allergens" name="allergens" class="form-control" value="<?php echo $plato["alergenos"]; ?>">
            </div>

            <div class=" col-sm-6 offset-sm-3 text-center">
                <button type="submit" class="btn btn-outline-success" name="actualizar_plato">Actualizar Plato</button>
            </div>
        </form>
    </div>
</div>


<?php 
include ('footer.php')

?>