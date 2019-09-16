<?php

class Persona{

    public $nombre;
    public $dni;

 public function __construct($Nombre="0", $Dni=0){
   $this->nombre= $Nombre;
   $this->dni= $Dni;
 }

public function Saludar(){
    echo "Hola $this->nombre , $this->dni";
}

}    