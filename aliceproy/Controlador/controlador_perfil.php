<?php
session_start();
if (isset($_POST['perfil'])) {
    // Recuperar datos del registro visualizados en el form del perfil
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $email = $_POST['correo'];

    // Datos del formulario
    $nombre_completo = $_POST['nombre_completo'];
    $direccion = $_POST['direccion'];
    $codigo_postal = $_POST['codigo_postal'];
    $localidad = $_POST['localidad'];
    $telefono = $_POST['telefono'];

    $avatar = 'default.png'; 

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
        $avatar = basename($_FILES['avatar']['name']);
        move_uploaded_file($_FILES['avatar']['tmp_name'], "../assets/img/" . $avatar);
    }

    // Función para actualizar el perfil de usuario en clientes.txt
    function actualizarPerfilUsuario($usuario, $contrasena, $nombre_completo, $direccion, $codigo_postal, $localidad, $telefono, $email, $avatar) {
        $archivo = file("../Modelo/clientes.txt"); // Lee el archivo en un arreglo de líneas
        $nueva_data = [];
        foreach ($archivo as $linea) {
            $datos = str_getcsv($linea); // Convierte la línea en un arreglo usando el delimitador de CSV
            // Si la línea corresponde al usuario actual, actualiza sus datos
            if ($datos[0] === $usuario) {
                $datos = [$usuario, $contrasena, $nombre_completo, $direccion, $codigo_postal, $localidad, $telefono, $email, $avatar];
            }
            // Convierte la línea actualizada o no actualizada de vuelta a formato CSV
            $nueva_data[] = implode(",", $datos);
        }
        // Sobrescribe el archivo con las líneas actualizadas
        file_put_contents("../Modelo/clientes.txt", implode("\n", $nueva_data));

        $_SESSION['aprobado'] = 1;
    }

    actualizarPerfilUsuario($usuario, $contrasena, $nombre_completo, $direccion, $codigo_postal, $localidad, $telefono, $email, $avatar);
    
    include ('../Vistas/home.php');
}
?>
