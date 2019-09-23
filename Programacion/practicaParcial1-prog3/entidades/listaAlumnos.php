<?php
class alumnosDAO{


public function __construct(){
  session_start();
  if(!isset($_SESSION["Alumnos"])){
      $_SESSION["Alumnos"]=array();
  }
}

public function cargarAlumno($alumno){
  array_push($_SESSION["Alumnos"],$alumno);
  $archivo=fopen("./alumnos.txt","a");
  fwrite($archivo,"$alumno->nombre"."-"."$alumno->apellido"."-"."$alumno->email"."-"."$alumno->foto".PHP_EOL);
  fclose($archivo);
}

public function consultarAlumno($apellidoBuscado){
  foreach( $_SESSION["Alumnos"] as $alumnos){
    if($valorLegajo == $alumnos->legajo){
        $alumnos->Nombre= $valorNombre;
        $alumnos->dni= $valorDni;
        $alumnos->legajo= $valorLegajo;
        $alumnos->Cuatrimestre= $valorCuatrimestre;
        break;
    }
}
}

}
?>
