<?php
class controladorRegistro
{
    public $archivoRegistro;
    public $pathArchivo;


    public function __construct($pathArchivo){
        $this->archivoRegistro= new GenericDao($pathArchivo);
        $this->pathArchivo= $pathArchivo;
    }

    public function cargarRegistro($caso,$casePostman)
    {
        $fecha = date("Y-n-d-H-i");
        $registro= "CONSULTA: "."$caso"." - CASO: "."$casePostman"."- FECHA: "."$fecha";
        $rta = $this->archivoRegistro->guardar($registro);
                if ($rta === true) 
                {
                    echo PHP_EOL.'registro Guardado';
                } 
                else 
                {
                    echo 'Hubo un error al guardar el registro';
                }
    }

    public function mostrarRegistros($fechaFiltro)
    {
        $fecha= explode("-",$fechaFiltro);
        $fechaUnix= mktime((int)$fecha[3],(int)$fecha[4],0,(int)$fecha[1],(int)$fecha[2],(int)$fecha[0]);

        $registros= json_decode($this->archivoRegistro->listar());
        foreach($registros as $individual)
        {
            $fechaIndividual= explode("FECHA: ",$individual);
            $fechaRegistro= explode("-",$fechaIndividual[1]);
            $fechaRegistroUnix= mktime((int)$fechaRegistro[3],(int)$fechaRegistro[4],0,(int)$fechaRegistro[1],(int)$fechaRegistro[2],(int)$fechaRegistro[0]);
            

            if($fechaRegistroUnix > $fechaUnix)
            {
                echo json_encode($individual).PHP_EOL;
            }
        }

    }
}
?>