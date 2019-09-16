<?php
require_once 'alumno.php';

class Alumno_dao{

    public $vec;

    public function __construct()
    {
        session_start();
        if(!isset($_SESSION["Alumnos"])){
            $_SESSION["alumno"]=array(new Alumno("fede",30,4,1),new Alumno("pepe",21,10,1),new Alumno("juan",21,8,1));
        }
       
    }

    public function Listar(){
        
        var_dump($_SESSION["alumno"]);
    }

    public function Agregar($valor){
        array_push($_SESSION["alumno"],$valor);
        $this->Listar();
    }

    public function Modificar($valorNombre,$valorDni,$valorLegajo,$valorCuatrimestre){
        
        foreach( $_SESSION["alumno"] as $alumnos){
            if($valorLegajo == $alumnos->legajo){
                $alumnos->Nombre= $valorNombre;
                $alumnos->dni= $valorDni;
                $alumnos->legajo= $valorLegajo;
                $alumnos->Cuatrimestre= $valorCuatrimestre;
                break;
            }
        }

    }

    public function Borrar($valorLegajo){
        foreach($_SESSION["alumno"] as $key=>$alumnos){
            if($valorLegajo == $alumnos->legajo)
            {
                unset($_SESSION["alumno"][$key]);
                break;
            }
        }
    }
}

