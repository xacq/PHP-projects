<?php
include ('head.php');

if ($_SESSION['aprobado'] == 1) {
    $archivo = fopen("../Modelo/clientes.txt", "r");
    
    if ($archivo) {
        while (($linea = fgetcsv($archivo)) !== false) {
            // Verificar que $linea tenga al menos 9 elementos antes de usar list()
            if (count($linea) >= 9) {
                list($usuarioCSV, $passwordCSV, $nombre_completo, $direccion, $cp, $localidad, $telefono, $correo, $avatar) = $linea;

                // Verifica si el usuario y la contraseña coinciden
                if ($_SESSION['usuario'] === $usuarioCSV && $_SESSION['contrasena'] === $passwordCSV) { ?>
                    <div class=" text-center">
                        <h1>Perfil</h1>
                        <div class="row text-start">
                        <div class=" col-sm-6 offset-sm-3">
                            <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                            <input class="form-control" type="text" name="usuario" value="<?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?>" readonly>
                        </div>

                        <div class=" col-sm-6 offset-sm-3">
                            <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                            <input class="form-control" type="text" name="contrasena" required value="<?php echo isset($_SESSION['contrasena']) ? $_SESSION['contrasena'] : ''; ?>">
                        </div>

                        <div class=" col-sm-6 offset-sm-3">
                            <label for="exampleFormControlInput1" class="form-label">Correo</label>
                            <input class="form-control" type="text" name="correo" required value="<?php echo isset($_SESSION['correo']) ? $_SESSION['correo'] : ''; ?>">
                        </div>


                            <div class=" col-sm-6 offset-sm-3">
                                <label for="exampleFormControlInput1" class="form-label">Nombre Completo</label>
                                <input class="form-control" type="text"  value="<?php echo htmlspecialchars($nombre_completo); ?>" readonly>
                            </div>

                            <div class=" col-sm-6 offset-sm-3">
                                <label for="exampleFormControlInput1" class="form-label">Direccion</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($direccion); ?>">
                            </div>

                            <div class=" col-sm-6 offset-sm-3">
                                <label for="exampleFormControlInput1" class="form-label">Codigo Postal</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($cp); ?>">
                            </div>

                            <div class=" col-sm-6 offset-sm-3">
                                <label for="exampleFormControlInput1" class="form-label">Localidad</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($localidad); ?>">
                            </div>

                            <div class=" col-sm-6 offset-sm-3">
                                <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($telefono); ?>">
                            </div>

                            <div class=" col-sm-6 offset-sm-3">
                                <label for="foto" class="form-label">Avatar</label>
                                <img src="../assets/img/<?php echo htmlspecialchars($avatar); ?>" width="200" alt="avatar" id="foto">
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                // Línea incompleta: Opcionalmente, puedes registrar un mensaje de depuración
                error_log("Línea incompleta en clientes.txt: " . implode(",", $linea));
            }
        }
        fclose($archivo);
    }
} else { ?>
    <div class=" text-center">
        <h1>Perfil</h1>
        <div class="row text-start">
            <form action="../Controlador/controlador_perfil.php" method="POST">

                <div class=" col-sm-6 offset-sm-3">
                    <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                    <input class="form-control" type="text" name="usuario" value="<?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?>" readonly>
                </div>

                <div class=" col-sm-6 offset-sm-3">
                    <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                    <input class="form-control" type="text" name="contrasena" required value="<?php echo isset($_SESSION['contrasena']) ? $_SESSION['contrasena'] : ''; ?>">
                </div>

                <div class=" col-sm-6 offset-sm-3">
                    <label for="exampleFormControlInput1" class="form-label">Correo</label>
                    <input class="form-control" type="text" name="correo" required value="<?php echo isset($_SESSION['correo']) ? $_SESSION['correo'] : ''; ?>">
                </div>

                <div class=" col-sm-6 offset-sm-3">
                    <label for="exampleFormControlInput1" class="form-label">Nombre Completo</label>
                    <input class="form-control" type="text" name="nombre_completo" required>
                </div>

                <div class=" col-sm-6 offset-sm-3">
                    <label for="exampleFormControlInput1" class="form-label">Direccion</label>
                    <input class="form-control" type="text" name="direccion" required>
                </div>

                <div class=" col-sm-6 offset-sm-3">
                    <label for="exampleFormControlInput1" class="form-label">Codigo Postal</label>
                    <input class="form-control" type="text" name="codigo_postal" required>
                </div>

                <div class=" col-sm-6 offset-sm-3">
                    <label for="exampleFormControlInput1" class="form-label">Localidad</label>
                    <input class="form-control" type="text" name="localidad" required>
                </div>

                <div class=" col-sm-6 offset-sm-3">
                    <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                    <input class="form-control" type="text" name="telefono" required>
                </div>

                <div class=" col-sm-6 offset-sm-3">
                    <label for="exampleFormControlInput1" class="form-label">Avatar</label>
                    <input type="file" class="form-control" name="avatar" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>

                <div class=" col-sm-6 offset-sm-3">
                    <button type="submit" class="btn btn-outline-success" name="perfil">Guardar perfil</button>
                </div>
            </form>
        </div>
    </div>


<?php
}
?>
    <div class=" text-center">
        <a href="home.php" class="btn btn-outline-secondary"> Regresar</a>
    </div>

<?php
include ('footer.php');
?>
