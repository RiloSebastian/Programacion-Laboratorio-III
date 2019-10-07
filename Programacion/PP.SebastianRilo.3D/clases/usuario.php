<?php
class Usuario{
    public $legajo;
    public $nombre;
    public $email;
    public $clave;
    public $fotoUno;
    public $fotoDos;

    public function __construct($nombre,$legajo,$email,$clave,$fotoUno,$fotoDos)
    {
        $this->nombre=$nombre;
        $this->legajo=$legajo;
        $this->clave= $clave;
        $this->fotoUno=$fotoUno;
        $this->fotoDos=$fotoDos;
        $this->email=$email;
    }
}
?>