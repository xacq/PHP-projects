<?php
// Obtener los datos del formulario
$id = $_POST["id"];
$category = $_POST["category"];
$name = $_POST["name"];
$price = $_POST["price"];
$image = $_POST["image"];
$allergens = $_POST["allergens"];

// Leer el archivo menú línea por línea
$file = fopen("../Modelo/menu.txt", "r");
$newMenu = []; // Arreglo para almacenar el menú actualizado

$id_counter = 1; // Variable para asignar IDs secuenciales
while (($line = fgets($file)) !== false) {
    $parts = explode("\t", trim($line)); // Dividir cada línea por tabulador
    // Saltar líneas vacías
    if ($line === "") {
        continue;
    }
    if ($id_counter == $id) {
        // Si el ID coincide, actualizar los datos del plato
        $updatedDish = "$category\t$name\t$price\t$image\t$allergens";
        $newMenu[] = $updatedDish;
    } else {
        // Si no coincide, mantener la línea original
        $newMenu[] = trim($line); // Asegurar que no haya saltos de línea adicionales
    }
    $id_counter++; // Incrementar el ID en cada línea
}
fclose($file);

// Sobrescribir el archivo con los datos actualizados
$file = fopen("../Modelo/menu.txt", "w");
foreach ($newMenu as $dishLine) {
    fwrite($file, $dishLine . "\n"); // Escribir cada línea en el archivo
}
fclose($file);

// Redirigir a la página principal
header("Location: ../Vistas/gestion_carta.php");
exit;
?>
