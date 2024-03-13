<?php
session_start();

if(isset($_SESSION['id'])) {
    
    if(isset($_POST['agregarTarea'])) {
        // Obtener los datos del formulario
        
        if(!empty(trim($_POST['numero'])) && !empty(trim($_POST['descripcion']))) {

        
            $dia = $_POST['dias'];
            $diaNumero = $_POST['numero']; 
            $mes = $_POST['meces'];
            $descripcion = $_POST['descripcion'];


            // Conexión a la base de datos
            $host = "localhost";
            $usuario = "root";
            $contrasena = "";
            $bd = "gestortareas";

            $conexion = new mysqli($host, $usuario, $contrasena, $bd);

            // Verificar conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Preparar la consulta SQL para insertar la tarea
            $sql = "INSERT INTO tareas (dia, diaNumero, mes, descripcion, cumplida, id_usuario) 
                    VALUES ('$dia', '$diaNumero', '$mes', '$descripcion', 0, " . $_SESSION['id'] . ")";

            // Ejecutar la consulta
            if ($conexion->query($sql) === TRUE) {
                echo "Tarea agregada correctamente.";
                $_SESSION['tarea_agregada'] = true;
                header("Location: vista.php");
            } else {
                echo "Error al agregar la tarea: " . $conexion->error;
            }

            // Cerrar conexión
            $conexion->close();
        
        } else {
            header("Location: vista.php");
        }
    
        
    }
} else {
    // Si no hay sesión iniciada, redirigir a la página de inicio de sesión
    header("Location: vista.php");
    exit();
}
?>
