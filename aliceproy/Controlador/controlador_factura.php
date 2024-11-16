<?php

$usuario = $_SESSION['usuario'];
$cliente_encontrado = false;
$file = fopen("../Modelo/clientes.txt", "r");
//Busco el usuario con la variable usuario de session
while (($line = fgetcsv($file)) !== false) {
    if ($line[0] === $usuario && isset($line[2])) {
        $nombre_cliente = $line[2];
        $cliente_encontrado = true;
        break;
    }
}
fclose($file);

if (!$cliente_encontrado) {
    die("No se encontró información de contacto para el cliente.");
}

// Guardar el pedido en pedidos.txt
$file_pedidos = fopen("../Modelo/pedidos.txt", "a");
$fecha_pedido = date("Y-m-d H:i:s");

foreach ($_SESSION['factura'] as $item) {
    $linea = [
        $nombre_cliente,
        $fecha_pedido,
        $item['nombre'],
        $item['cantidad'],
        number_format($item['precio_unitario'], 2),
        number_format($item['subtotal'], 2),
    ];
    fputcsv($file_pedidos, $linea);
}

$total_linea = [
    $nombre_cliente,
    $fecha_pedido,
    "TOTAL",
    "",
    "",
    number_format($_SESSION['total'], 2),
];
fputcsv($file_pedidos, $total_linea);
fclose($file_pedidos);

// Limpiar sesión y finalizar pedido
unset($_SESSION['factura']);
unset($_SESSION['total']);
?>