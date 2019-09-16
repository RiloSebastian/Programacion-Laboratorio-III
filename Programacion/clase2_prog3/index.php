<?php

//prueba de que funciona. contador por cada peticion
/*
if(!isset($_SESSION["count"])){
    $_SESSION["count"]=0;
}

 echo $_SESSION["count"]+=1;

*/

require_once 'clases/alumno_Dao.php';
require_once 'clases/alumno.php';

$alumno= new alumno_Dao();

switch($_SERVER["REQUEST_METHOD"])
{
    case "GET":
        $alumno->Listar();
        break;
    case "POST":
        if(isset($_POST["nombre"]) && isset($_POST["dni"]) && isset($_POST["legajo"]) && isset($_POST["cuatrimestre"]))
        {
            $value= new alumno($_POST["nombre"],$_POST["dni"],$_POST["legajo"],$_POST["cuatrimestre"]);
            $alumno->Agregar($value);
        }
        break;
    case "PUT":
        if(isset($_GET["nombre"]) && isset($_GET["dni"]) && isset($_GET["legajo"]) && isset($_GET["cuatrimestre"]))
        {
            $alumno->Modificar(($_GET["nombre"]),($_GET["dni"]),($_GET["legajo"]),($_GET["cuatrimestre"]));
        }
        break;
    case "DELETE":
        if(isset($_GET["legajo"]))
        {
            $alumno->Borrar($_GET["legajo"]);
        }
        
        break;
}


//session_unset();
//session_destroy();
?>