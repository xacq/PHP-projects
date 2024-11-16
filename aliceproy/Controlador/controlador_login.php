<?php
session_start();

if (isset($_POST['login_usuario'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];
    
    // Función para autenticar al usuario
    function autenticarUsuario($usuario, $contrasena) {
        $archivo = fopen("../Modelo/clientes.txt", "r");
        
        if ($archivo) {
            while (($linea = fgetcsv($archivo)) !== false) {
                // Verifica que la línea tenga al menos 9 elementos
                if (count($linea) >= 9) {
                    $_SESSION['aprobado'] = 1;
                    list($usuarioCSV, $passwordCSV, $nombre_completo, $direccion, $cp, $localidad, $telefono, $correo, $avatar) = $linea;
                    // Verifica si el usuario y contraseña coinciden
                    if ($usuario === $usuarioCSV && $contrasena === $passwordCSV) {
                        // Guarda la información en la sesión
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['contrasena'] = $contrasena;
                        $_SESSION['correo'] = $correo;
                        echo "<form id='redirectForm' action='../Vistas/home.php' method='post'></form>";
                        echo "<script>document.getElementById('redirectForm').submit();</script>"; 
                        //include("../Vistas/home.php");
                        exit();
                        fclose($archivo);
                        return true;
                    }
                }
                else {
                    $_SESSION['aprobado'] = 0;
                    list($usuarioCSV, $passwordCSV, $correo) = $linea;
                    // Verifica si el usuario y contraseña coinciden
                    if ($usuario === $usuarioCSV && $contrasena === $passwordCSV) {
                        // Guarda la información en la sesión
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['contrasena'] = $contrasena;
                        $_SESSION['correo'] = $correo;
                        echo "<form id='redirectForm' action='../Vistas/home.php' method='post'></form>";
                        echo "<script>document.getElementById('redirectForm').submit();</script>"; 
                        //include("../Vistas/home.php");
                        exit();
                        fclose($archivo);
                        return true;
                    }
                }

            }
            fclose($archivo);
        }
        echo "El usuario no ha sido autenticado";
        echo "<form id='redirectForm' action='../Vistas/login.php' method='post'></form>";
        echo "<script>document.getElementById('redirectForm').submit();</script>"; 
        //include("../Vistas/login.php");
        return false;
    }

    // Llamada a la función para autenticar
    autenticarUsuario($usuario, $contrasena);
}
?>
