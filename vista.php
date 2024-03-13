<!DOCTYPE html>
<html>
<head>
    <title>Gestion de Tareas</title>
</head>
<body>
    
    <h1>Gestion de Tareas</h1>
    
    <?php
    session_start();
    if(isset($_SESSION['id'])) {
        echo "Hola " . $_SESSION['nombre'] . "!<br>";
        echo "<form action='./controladores/controlador.php' method='post'>";
        echo "<input type='submit' name='cerrar_sesion' value='Cerrar Sesión'>";
        echo "</form>";
        echo "<br>";
        echo "<h2>Ingresar tarea</h2>";
        echo "----------------------";
        echo '<br>';
        echo '<br>';
        
        echo "<form action='addTarea.php' method='post'>";
        echo '<h3>DIA</h3>';
        echo "<select name='dias'>";
        echo '<option value="Lunes" selected>Lunes</option>';
        echo '<option value="Martes" >Martes</option>';
        echo '<option value="Miercoles">Miercoles</option>';
        echo '<option value="Jueves">Jueves</option>';
        echo '<option value="Viernes">Viernes</option>';
        echo '<option value="Sabado">Sabado</option>';
        echo '<option value="Domingp">Domingo</option>';
        echo '</select>';

        echo '<input type="text" id="numero"  name="numero" />';

        echo '<h3>MES</h3>';
        echo "<select name='meces'>";
        echo '<option value="Enero" selected>Enero</option>';
        echo '<option value="Febrero" >Febrero</option>';
        echo '<option value="Marzo">Marzo</option>';
        echo '<option value="Abril">Abril</option>';
        echo '<option value="Mayo">Mayo</option>';
        echo '<option value="Junio">Junio</option>';
        echo '<option value="Julio">Julio</option>';
        echo '<option value="Agosto">Agosto</option>';
        echo '<option value="Septiembre">Septiembre</option>';
        echo '<option value="Octubre">Octubre</option>';
        echo '<option value="Noviembre">Noviembre</option>';
        echo '<option value="Diciembre">Diciembre</option>';
        echo '</select>';

        echo '<h3>Descripcion</h3>';
        
        echo '<input type="text" id="descripcion"  name="descripcion" />';
        
        echo '</br>';

        echo "<input type='submit' name='agregarTarea' value='Agregar Tarea'>";
        
        echo '<br>';
        
         // Verificar si la variable de sesión 'tarea_agregada' está establecida y mostrar el mensaje correspondiente
         if(isset($_SESSION['tarea_agregada'])) {
            echo "Se ha agregado una tarea nueva.";
            // Después de mostrar el mensaje, elimina la variable de sesión para que el mensaje no se muestre en cada recarga
                unset($_SESSION['tarea_agregada']);
            }
        
        echo "</form>";

        // Botón para mostrar todas las tareas ordenadas por día y mes
    echo "<form action='./controladores/controlador2.php' method='post'>";
    echo "<input type='hidden' name='mostrar_tareas_ordenadas'>";
    echo "<input type='submit' value='Mostrar Todas las Tareas Ordenadas'>";
    echo "</form>";
        

    } else {
        echo "<form action='./controladores/controlador.php' method='post'>";
        echo "Correo: <input type='text' name='correo'><br>";
        echo "Contraseña: <input type='password' name='contrasena'><br>";
        echo "<input type='submit' name='login' value='Iniciar Sesión'>";
        echo '<br>';
        echo '<br>';
        echo '<a href="formulario_registro.php"> Registrarse </a>';
        echo "</form>";
       
    }
    ?>
</body>
</html>