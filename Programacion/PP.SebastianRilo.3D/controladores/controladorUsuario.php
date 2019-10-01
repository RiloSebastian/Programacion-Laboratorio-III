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
                if ($rta === true) {
                    echo 'Guardado';
                } 
                else {
                    echo 'Hubo un error al guardar';
                }
        }
        else
        {
            echo "un alumno con este legajo ya existe";
        }
    }

    public function modificarUsuario($legajo,$POST,$FILES){

                $this->imagenBackUP($FILES,$POST);
                $fotoUno = $this->moverImagen($FILES["fotoUno"],1,$POST["legajo"]);
                $fotoDos = $this->moverImagen($FILES["fotoDos"],2,$POST["legajo"]);

                $rta = $this->archivoUsuario->modificar("legajo", $_POST["legajo"], "foto", $filename);
                if ($rta === true) {
                    echo 'foto modificada';
                } else {
                    echo 'Hubo un error al modificar la imagen';
                }
           
        
        if (isset($_POST["nombre"])) {
            $rta = $this->alumnosDao->modificar("legajo", $_POST["legajo"], "nombre", $_POST["nombre"]);
            if ($rta === true) {
                echo PHP_EOL . 'Nombre modificado';
            } else {
                echo PHP_EOL . 'Hubo un error al modificar el nombre';
            }
        }
        if (isset($_POST["clave"])) {
            $rta = $this->alumnosDao->modificar("legajo", $_POST["legajo"], "clave", $_POST["clave"]);
            if ($rta === true) {
                echo PHP_EOL . 'clave modificada';
            } else {
                echo PHP_EOL . 'Hubo un error al modificar la clave';
            }
        }
        if (isset($_POST["email"])) {
            $rta = $this->alumnosDao->modificar("legajo", $_POST["legajo"], "email", $_POST["email"]);
            if ($rta === true) {
                echo PHP_EOL . 'email modificado';
            } else {
                echo PHP_EOL . 'Hubo un error al modificar el email';
            }
        }
    }

    function imagenBackUP($FILES,$POST)
    {
            $hoy = date("d-m-Y G:i");
            $rutaAntigua1 = ($this->archivoUsuario->obtenerPorId("legajo", $POST["legajo"]))->fotoUno;
            $array = explode(".", $rutaAntigua1);
            $rutaNueva1 = "fotos/backUpFotos/".$_POST["legajo"]."_1_".$hoy.".".end($array);
            $rutaAntigua2 = ($this->archivoUsuario->obtenerPorId("legajo", $POST["legajo"]))->fotoDos;
            $array = explode(".", $rutaAntigua2);
            $rutaNueva2 = "./fotos/backUpFotos/".$_POST["legajo"]."_2_".$hoy.".".end($array);
            var_dump($rutaAntigua1);
            var_dump($rutaNueva1);
            rename($rutaAntigua1, $rutaNueva1);
            rename($rutaAntigua2, $rutaNueva2);
            
    }

    function moverImagen($foto,$ordenFoto,$legajo)
    {
            $rutaImagenTemp = $foto["tmp_name"];
            $extension = pathinfo($foto["name"], PATHINFO_EXTENSION);
            $filename = "./fotos/$legajo"."_"."$ordenFoto".".$extension";
            $rta = move_uploaded_file($rutaImagenTemp, $filename);
            if($rta== true){
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
}

?>