<?php
// En controlador.php

session_start();



// Configuración de la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "gestortareas";



$conexion = new mysqli($host, $usuario, $contrasena, $bd);

if(isset($_POST['mostrar_tareas_ordenadas'])) {
    // Obtener el ID de usuario de la sesión
    $id_usuario = $_SESSION['id'];

    echo "<h3> Hola " . $_SESSION['nombre'] . " estas son tus tareas" . "</h3>" ;

    // Consultar todas las tareas del usuario actual ordenadas por día y mes
    $consulta = "SELECT * FROM tareas WHERE id_usuario = $id_usuario ORDER BY FIELD(mes, 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'),diaNumero";
    $resultado = $conexion->query($consulta);

    // Verificar si se obtuvieron resultados
    if ($resultado->num_rows > 0) {
        // Mostrar todas las tareas en forma de tabla
        echo "<table border='1'>";
        echo "<tr><th>Día</th><th>    </th><th>Mes</th><th>TAREA</th></tr>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['dia'] . "</td>";
            echo "<td>" . $fila['diaNumero'] . "</td>";
            echo "<td>" . $fila['mes'] . "</td>";
            echo "<td>" . $fila['descripcion'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay tareas para mostrar.";
    }

    echo '<br>';
    echo '<a href="/tareamvc3/vista.php"> VOLVER </a>';

}

?>