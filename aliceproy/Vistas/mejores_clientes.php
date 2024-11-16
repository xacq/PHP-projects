<?php 
include ('./head.php');

// Leer y procesar el archivo de pedidos
$pedidosFile = "../Modelo/pedidos.txt";
$clientes = [];

if (file_exists($pedidosFile)) {
    $file = fopen($pedidosFile, "r");

    while (($line = fgets($file)) !== false) {
        $data = str_getcsv($line); // Leer la línea y dividirla en elementos
        
        // Saltar líneas vacías
        if (count($data) < 6 || trim($data[0]) === "") {
            continue;
        }

        list($cliente, $fecha, $producto, $cantidad, $precio, $total) = $data;

        // Cuando la línea contiene el "TOTAL" es el indicador de fin de pedido
        if (strtoupper($producto) === "TOTAL") {
            if (!isset($clientes[$cliente])) {
                $clientes[$cliente] = ['total_gasto' => 0, 'num_pedidos' => 0];
            }
            
            // Actualizar datos del cliente
            $clientes[$cliente]['total_gasto'] += (float)$total;
            $clientes[$cliente]['num_pedidos']++;
        }
    }

    fclose($file);
}

// Calcular la media de gasto y ordenar por el gasto total de mayor a menor
foreach ($clientes as $nombre => $datos) {
    $clientes[$nombre]['media_gasto'] = $datos['total_gasto'] / $datos['num_pedidos'];
}

// Ordenar los clientes por el gasto total de mayor a menor usando uasort
uasort($clientes, function($a, $b) {
    return $b['total_gasto'] <=> $a['total_gasto'];
});

// Mostrar resultados

echo "<div class=' text-center'> ";
echo "<h2>Mejores Clientes</h2>";
echo "<table border='1' ";
echo "<tr><th>Cliente</th><th>Total Gastado (€)</th><th>Número de Pedidos</th><th>Media de Gasto por Pedido (€)</th></tr>";
foreach ($clientes as $cliente => $datos) {
    echo "<tr>";
        echo "<td>" . htmlspecialchars($cliente) . "</td>";
        echo "<td>" . number_format($datos['total_gasto'], 2) . " €</td>";
        echo "<td>" . $datos['num_pedidos'] . "</td>";
        echo "<td>" . number_format($datos['media_gasto'], 2) . " €</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
?>

<?php 
include ('./footer.php') 
?>
