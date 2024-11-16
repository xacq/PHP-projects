<?php

// Recuperar datos del pedido
$pedido = $_POST['pedido'];
$total = 0;
$factura_detalles = [];
$kebab_count = 0;
$durum_count = 0;

// Calcular el precio total y contar kebabs y durums
foreach ($pedido as $item) {
    $cantidad = (int)$item['cantidad'];
    if ($cantidad > 0) {
        $subtotal = $cantidad * $item['precio'];
        $total += $subtotal;
        
        // Almacenar detalles de la factura
        $factura_detalles[] = [
            'nombre' =>$item['nombre'],
            'cantidad' => $cantidad,
            'precio_unitario' => $item['precio'],
            'subtotal' => $subtotal,
        ];
        
        // Contar kebabs y durums para aplicar ofertas
        if (strpos(strtolower($item['nombre']), 'kebab') !== false) {
            $kebab_count += $cantidad;
        } elseif (strpos(strtolower($item['nombre']), 'durum') !== false) {
            $durum_count += $cantidad;
        }
    }
}

// Aplicar ofertas
if ($kebab_count >= 5) {
    $total *= 0.9; // Descuento del 10% para grupos de 5 kebabs
}
if ($durum_count >= 3) {
    $total *= 0.9; // Descuento del 10% para grupos de 3 durums
}

// Almacenar la factura en la sesión para recuperar el pedido si el cliente no finaliza
$_SESSION['factura'] = $factura_detalles;
$_SESSION['total'] = $total;

?>