<?php

include_once './modelo/Usuario.php';



class GestorUsuarios {
    
    private $mysqli;
    
    public function __construct($conexion){
        $this->mysqli = $conexion;
    }
    
    
    public function validarUsuario($usuario){
       

       return true;
    }
    
    /**
     * Añade el usuario a la base de datos. 
     * 
     */

    public function insertarUsuario($usuario){
        // mysqli_real_escape_string -> Escapa caracteres especiales en la cadena dada.
        $consulta = sprintf("INSERT INTO usuarios (id,nombre, apellido, correo,password) VALUES ('%s','%s','%s','%s','%s')",        
            $this->mysqli->real_escape_string($usuario->getId()),
            $this->mysqli->real_escape_string($usuario->getNombre()),
            $this->mysqli->real_escape_string($usuario->getApellidos()),
            $this->mysqli->real_escape_string($usuario->getEmail()),
            $this->mysqli->real_escape_string($usuario->getPassword())
        );
        
        // Se ejecuta la consulta.
        $this->mysqli->query($consulta);  
        
        // Se comprueba que si se ha insertado.
        if(!$this->mysqli->affected_rows){
            die("<h3>Error: No se ha podido insertar el usuario en la base de datos.</h3>");
            return false;
        }
        else{
            return true;
        }
    }
    
    
    
    
    

   



}

?>