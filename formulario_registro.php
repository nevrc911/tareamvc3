<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    
   
    <title>Registro</title>
</head>
<body>
    <h1>GESTOR DE TAREAS</h1>
    <?php
    require_once 'controladores/config.php';
    require 'modelo/usuario.php';
    require 'controladores/GestorUsuarios.php';

    // Inicializamos las variables que se usarán para los campos de texto del formulario.
    $email="";
    $nombre="";
    $apellidos="";
    $password="";

    if(isset($_POST['registrar'])){ 
        $conexion = new mysqli($servidor, $usuarioBD, $passwordBD, $baseDatos);
        $nuevoUsuario = new Usuario($_POST['nombre'],$_POST['apellidos'],$_POST['email'],$_POST['password']);
        $gestor = new GestorUsuarios($conexion); 

        // Si todos los campos del usuario son correctos y se realiza la inserción del usuario con éxito,
        // se redirige a la página correspondiente.
        if (($gestor->validarUsuario($nuevoUsuario)) && ($gestor->insertarUsuario($nuevoUsuario))) {
            $conexion->close();
            header("Location: vista.php");
        } else {
            // Si algo falla, se recuperan los datos introducidos por el usuario
            // para que no tenga que reescribir los que estuviesen correctos.
            $email=$_POST['email'];
            $nombre=$_POST['nombre'];
            $apellidos=$_POST['apellidos'];
            $password=$_POST['password'];
        }
    }
    ?>

    <section>
        <div id="formulario_registro">
            <h2>Formulario registro</h2>
            <form action="#" method="POST">
                
                <div class="campoFormulario">
                    <label for="email">Email: <span class="obligatorio">*</span></label>
                    <input type="text" id="email" name="email" maxlength="30" value="<?php echo $email ?>" onblur="return validarEmail(this.value)"/>
                </div>
                <div class="campoFormulario">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" maxlength="20" value="<?php echo $nombre ?>" onblur="return validarNombre(this.value)"/>
                </div>
                <div class="campoFormulario">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" maxlength="30" value="<?php echo $apellidos ?>" onblur="return validarApellidos(this.value)"/>
                </div>
                
                <div class="campoFormulario">
                    <label for="password">Contraseña: <span class="obligatorio">*</span></label>
                    <input type="password" id="password" name="password" maxlength="20" value="<?php echo $password ?>" onblur="return validarPassword(this.value)" autocomplete="off"/>
                </div>
                <div class="botonFormulario">
                    <input type="submit" id="registrar" name="registrar" value="Registrarse">
                </div> 
            </form> 
        </div>
    </section>
</body>
</html>