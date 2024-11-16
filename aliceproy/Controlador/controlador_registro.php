<?php
session_start();

if (isset($_POST['registrar'])){

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $email = $_POST['email'];

        function registroUsuario($usuario,$contrasena,$email) {
            $linea = "$usuario,$contrasena,$email\n";
            $archivo = fopen("../Modelo/clientes.txt", "a");
            fwrite($archivo, $linea);
            fclose($archivo);
            //('../Vistas/bienvenido.php');
            echo "<form id='redirectForm' action='../Vistas/bienvenido.php' method='post'></form>";
            echo "<script>document.getElementById('redirectForm').submit();</script>"; 
    }
    
    registroUsuario($usuario, $contrasena, $email);
}





?>