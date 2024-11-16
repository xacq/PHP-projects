<?php 
include ('head.php');
include ('../Controlador/controlador_menu.php');

?>
<div class=" text-center">

<h1>GESTION DE CARTA</h1>

<div class=" text-center">

<h1>Nuestro Menú</h1>

    <table>
    <tr>
        <th>Categoría</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Alérgenos</th>
        <th>Acción</th>
    </tr>

    <?php foreach ($menu as $plato) { ?>
    <tr>
        <td><?php echo $plato["categoria"]; ?></td>
        <td><?php echo $plato["nombre"]; ?></td>
        <td><?php echo $plato["precio"]; ?> €</td>
        <td><img src="../assets/img/<?php   echo $plato["imagen"]; ?>" alt="<?php echo $plato["nombre"]; ?>" height="200"></td>
        <td><?php echo $plato["alergenos"]; ?></td>
        <td><a href="./editar_plato.php?id=<?php echo $plato["id"];?>">Actualizar</a></td>
    </tr>
    <?php } ?>

    </table>

</div>

<?php 
include ('footer.php')?>