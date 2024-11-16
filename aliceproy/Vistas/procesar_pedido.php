<?php
include ('head.php');
include '../controlador/controlador_menu.php';
include '../Controlador/controlador_procesar_pedido.php';
?>

<div class=" text-center mb-5">
    <h2>Factura</h2>
    <table>
        <tr><th>Producto</th><th>Cantidad</th><th>Precio Unitario</th><th>Subtotal</th></tr>
        <?php foreach ($factura_detalles as $detalle): ?>
        <tr>
            <td><?php echo $detalle['nombre']; ?></td>
            <td><?php echo $detalle['cantidad']; ?></td>
            <td><?php echo str_pad(number_format($detalle['precio_unitario'], 2), 4, STR_PAD_LEFT) . '€'; ?></td>
            <td><?php echo str_pad(number_format($detalle['subtotal'], 2), 4,  STR_PAD_LEFT) . '€'; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2 class=" "><strong>Total: </strong><?php echo str_pad(number_format($total, 2), 4,  STR_PAD_LEFT) . '€'; ?></h2>

</div>

<div class=" text-center ">
    <form action="finalizar_pedido.php" method="POST">
        <button type="submit" class="btn btn-outline-success">Finalizar Pedido</button>
    </form>
</div>

<?php 
include ('footer.php');
?>