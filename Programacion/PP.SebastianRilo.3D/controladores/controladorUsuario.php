<?php
class ControladorUsuario
{
    public $archivoUsuario;
    public $pathArchivo;


    public function __construct($pathArchivo){
        $this->archivoUsuario= new GenericDao($pathArchivo);
        $this->pathArchivo= $pathArchivo;
    }

    public function cargarUsuario($nombre,$legajo,$email,$clave,$fotoUno,$fotoDos){

        if($this->archivoUsuario->obtenerPorId("legajo",$legajo) == null)
        {
            $fotoUno = $this->moverImagen($fotoUno,1,$legajo);
            $fotoDos = $this->moverImagen($fotoDos,2,$legajo);
            
                $usuario = new Usuario($nombre,$legajo,$email,$clave,$fotoUno,$fotoDos);
               
                $rta = $this->archivoUsuario->guardar($usuario);
                if ($rta === true) 
                {
                    echo 'Guardado';
                } 
                else 
                {
                    echo 'Hubo un error al guardar';
                }
        }
        else
        {
            echo "un alumno con este legajo ya existe";
        }
    }

    public function modificarUsuario($legajo,$POST,$FILES){

        if(isset($FILES["fotoUno"]))
        {
            $this->imagenBackUP($FILES,$POST,1);
            $fotoUno = $this->moverImagen($FILES["fotoUno"],1,$POST["legajo"]);
            $rta = $this->archivoUsuario->modificar("legajo", $POST["legajo"], "fotoUno", $FILES["fotoUno"]);
            if ($rta === true) 
            {
                echo 'foto 1 modificada';
            } else 
            {
                echo 'Hubo un error al modificar la imagen';
            }
        }
        if(isset($FILES["fotoDos"]))
        {
            $this->imagenBackUP($FILES,$POST,2);
            $fotoDos = $this->moverImagen($FILES["fotoDos"],2,$POST["legajo"]);
            $rta = $this->archivoUsuario->modificar("legajo", $POST["legajo"], "fotoDos", $FILES["fotoDos"]);
            if ($rta === true) 
            {
                echo 'foto 2 modificada';
            } else 
            {
                echo 'Hubo un error al modificar la imagen';
            }
        }   
        if (isset($POST["nombre"])) {
            $rta = $this->alumnosDao->modificar("legajo", $POST["legajo"], "nombre", $POST["nombre"]);
            if ($rta === true) {
                echo PHP_EOL . 'Nombre modificado';
            } else {
                echo PHP_EOL . 'Hubo un error al modificar el nombre';
            }
        }
        if (isset($POST["clave"])) {
            $rta = $this->alumnosDao->modificar("legajo", $POST["legajo"], "clave", $POST["clave"]);
            if ($rta === true) 
            {
                echo PHP_EOL . 'clave modificada';
            } else 
            {
                echo PHP_EOL . 'Hubo un error al modificar la clave';
            }
        }
        if (isset($POST["email"])) {
            $rta = $this->alumnosDao->modificar("legajo", $POST["legajo"], "email", $POST["email"]);
            if ($rta === true) 
            {
                echo PHP_EOL . 'email modificado';
            } else 
            {
                echo PHP_EOL . 'Hubo un error al modificar el email';
            }
        }
    }

    function imagenBackUP($FILES,$POST,$ordenFoto)
    {
            $hoy = date("Y-n-d H:i");
            if($ordenFoto ==1)
            {
                $rutaAntigua = ($this->archivoUsuario->obtenerPorId("legajo", $POST["legajo"]))->fotoUno;   
            }
            else if($ordenFoto == 2)
            {
                $rutaAntigua = ($this->archivoUsuario->obtenerPorId("legajo", $POST["legajo"]))->fotoDos;
            }  
            $array = explode(".", $rutaAntigua);
            $rutaNueva = "fotos/backUpFotos/".$POST["legajo"]."_".$ordenFoto."_".$hoy.".".end($array);
            var_dump($rutaAntigua);
            var_dump($rutaNueva);
            rename($rutaAntigua, $rutaNueva);
    }

    function moverImagen($foto,$ordenFoto,$legajo)
    {
            $rutaImagenTemp = $foto["tmp_name"];
            $extension = pathinfo($foto["name"], PATHINFO_EXTENSION);
            $filename = "./fotos/$legajo"."_"."$ordenFoto".".$extension";
            $rta = move_uploaded_file($rutaImagenTemp, $filename);
            if($rta== true)
            {
                return $filename;
            }
        else
        {
            throw new Exception("no se pudo guardar la foto");
        }
    }

    public function login($legajo, $clave)
    {
        $usuario= json_decode($this->archivoUsuario->getByAttributeCaseInsensitive("legajo",$legajo));
        
        if($usuario[0]->clave == $clave){
            return json_encode($usuario);
        }
    }

    public function mostrar($legajo=null)
    {
        $usuario=null;  
        if($legajo != null)
        {
            $usuario= json_decode($this->archivoUsuario->getByAttributeCaseInsensitive("legajo",$legajo));
            unset($usuario[0]->clave);
            echo json_encode($usuario);
        }
        else
        {
            $usuario= json_decode($this->archivoUsuario->listar());
            foreach($usuario as $elemento)
            {
                unset($elemento->clave);
            }
            echo json_encode($usuario).PHP_EOL;
        }
    }
}

?>