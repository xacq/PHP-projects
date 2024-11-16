<?php

// Función para obtener el menú desde el archivo
function obtenerMenu() {
    $menu = [];
    $file = fopen("../Modelo/menu.txt", "r");
  
    if (!$file) {
      die("Error al abrir el archivo");
    }
  
    $id = 1; // Inicializar el contador de ID
  
    while (($line = fgets($file)) !== false) {
      $parts = explode("\t", trim($line));
  
      // Crear un arreglo asociativo con nombres de claves predefinidos
      $plato = [
        "id" => $id, // Asignar ID al plato
        "categoria" => "",
        "nombre" => "",
        "precio" => "",
        "imagen" => "",
        "alergenos" => "",
      ];
  
      // Asignar los valores de $parts al arreglo $plato
      for ($i = 0; $i < count($parts); $i++) {
        switch ($i) {
          case 0:
            $plato["categoria"] = $parts[$i];
            break;
          case 1:
            $plato["nombre"] = $parts[$i];
            break;
          case 2:
            $plato["precio"] = $parts[$i];
            break;
          case 3:
            $plato["imagen"] = $parts[$i];
            break;
          case 4:
            $plato["alergenos"] = $parts[$i];
            break;
          default:
            // Ignorar valores adicionales
            break;
        }
      }
  
      // Agregar el plato al menú
      $menu[] = $plato;
      $id++; // Incrementar el contador de ID
    }
  
    fclose($file);
    return $menu;
  }

// Obtener el menú
$menu = obtenerMenu();

?>