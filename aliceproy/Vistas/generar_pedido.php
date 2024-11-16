<?php 
include ('./head.php');
include '../Controlador/controlador_menu.php'; // Controlador que obtiene el menu
?>

<div>
    <h2>Generar Pedido</h2>
    <div class="col-sm-8 offset-sm-2">
    <form action="./procesar_pedido.php" method="POST">
    <?php foreach ($menu as $plato): ?>
        <div>
            <div class="row">
                <div class="col-sm-6">
                    <h3 ><strong><?php echo htmlspecialchars($plato['categoria']); ?></strong> - <?php echo htmlspecialchars($plato['nombre']); ?></h3>
                    <img  src="../assets/img/<?php echo htmlspecialchars($plato['imagen']); ?>" alt="foto" width="300px">
                    
                </div>
                <div class="col-sm-6">
                    <h5 class="text-danger">Alérgenos: <?php echo htmlspecialchars($plato['alergenos']); ?></h5>
                    <h2 class="text-danger"><strong>Precio: </strong><?php echo number_format((float)$plato['precio'], 2); ?>€</h2>
                    <label>Cantidad:</label>
                    <input type="number" name="pedido[<?php echo $plato['id']; ?>][cantidad]" id="cantidad_<?php echo $plato['id']; ?>" min="0" max="10" value="0">
                    <input type="hidden" name="pedido[<?php echo $plato['id']; ?>][nombre]" value="<?php echo  htmlspecialchars($plato['categoria'])." - ".htmlspecialchars($plato['nombre']); ?>">
                    <input type="hidden" name="pedido[<?php echo $plato['id']; ?>][precio]" value="<?php echo $plato['precio']; ?>">
                </div>
                </div>
        </div>
        <hr>
    <?php endforeach; ?>
    
    <button type="submit" name="comprobar_ofertas">Generar Factura</button>
</form>
    </div>
</div>
<?php 
include ('./footer.php')?>

                    PEDIDO[1][10]
                    PEDIDO[1][KEBAB]
                    PEDIDO[1][10]
                    PEDIDO[2][20]
                    PEDIDO[2][CHURRI]
                    PEDIDO[2][9]
