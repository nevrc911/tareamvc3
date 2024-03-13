<?php
include '../modelo/modelo.php';

// Configuración de la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "gestortareas";

$modelo = new Modelo($host, $usuario, $contrasena, $bd);

if (isset($_POST['login'])) {
    if(!empty(trim($_POST['correo'])) && !empty(trim($_POST['contrasena']))) {
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        if ($modelo->validarUsuario($correo, $contrasena)) {
            header("Location: /tareamvc3/vista.php");
        } else {
            echo "Usuario o contraseña incorrectos";
            header("Location: /tareamvc3/vista.php");
        }
    } else {
        header("Location: /tareamvc3/vista.php");
    }

}

if (isset($_POST['cerrar_sesion'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: /tareamvc3/vista.php");
}

$modelo->cerrarConexion();
?>