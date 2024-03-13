<?php

/**
 * Description of Usuarios
 *
 * 
 */

class Usuario {
    
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    
      
     
    public function __construct($nombre,$apellidos,$email,$password='') {
        $this->id="";
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->email=$email;
        $this->password=$password;   
    
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getEmail(){
        return $this->email;
    }
         
    public function getNombre(){
        return $this->nombre;
    }    

    public function getApellidos(){
        return $this->apellidos;
    }
    
    
    
    public function getPassword(){
        return $this->password;
    }
    
    
    
}

?>