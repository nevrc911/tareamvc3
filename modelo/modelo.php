<?php
class Modelo {
    private $conexion;

    public function __construct($host, $usuario, $contrasena, $bd) {
        $this->conexion = new mysqli($host, $usuario, $contrasena, $bd);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function validarUsuario($correo, $contrasena) {
        $correo = $this->conexion->real_escape_string($correo);
        $query = "SELECT id, nombre, correo FROM usuarios WHERE correo = '$correo' AND password = '$contrasena'";
        $resultado = $this->conexion->query($query);
        if ($resultado->num_rows == 1) {
            session_start();
            $usuario = $resultado->fetch_assoc();
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];
            return true;
        } else {
            return false;
        }
    }

    public function cerrarConexion() {
        $this->conexion->close();
    }
}