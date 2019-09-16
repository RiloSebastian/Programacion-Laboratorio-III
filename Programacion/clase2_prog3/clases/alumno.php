<?php
require_once 'persona.php';

class Alumno extends Persona {
    public $legajo;
    public $cuatrimestre;

    public function __construct($Nombre="0", $Dni=0, $leg=0, $cu=1)
    {   parent::__construct($Nombre,$Dni);
    
        $this->legajo= $leg;
        $this ->cuatrimestre= $cu;
    }

    public function Saludar(){
        return parent::Saludar."$this->legajo , $this->cuatrimestre";
    }



}