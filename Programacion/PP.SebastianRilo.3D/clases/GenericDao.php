<?php

class GenericDao{

    public $archivo;
    public function __construct($archivo)
    {
        $this->archivo = $archivo;
    }

    public function guardar($objeto): bool
    {
        try {
            $objetos= array();
            if(file_exists($this->archivo))
            {
                $objetos = json_decode($this->listar());
            }

            $archivo = fopen($this->archivo, "w");
            array_push($objetos, $objeto);
            fwrite($archivo, json_encode($objetos).PHP_EOL);
            return true;
        } catch (Exception $e) {
            throw new Exception("El objeto no se guardo", 0, $e);
        } finally {
            fclose($archivo);
        }
    }

    public function listar()
    {
        try {
            $archivo = fopen($this->archivo, "r");
            return fread($archivo, filesize($this->archivo));
        } catch (Exception $e) {
            throw new Exception("El archivo No se pudo listar", 0, $e);
        } finally {
            fclose($archivo);
        }
    }

    public function borrar($nombreClave, $valor): bool
    {
        try {
            $retorno = false;
            $objetos = json_decode($this->listar());
            $archivo = fopen($this->archivo, "w");
            foreach ($objetos as $clave => $objeto) {
                if ($objeto->$nombreClave == $valor) {
                    if($objeto->foto !=null)
                    {
                        unlink($objeto->foto);
                    }
                    unset($objetos[$clave]);
                    $retorno = true;
                    break;
                }
            }
            fwrite($archivo, json_encode($objetos));
            return $retorno;
        } catch (Exception $e) {
            throw new Exception("El objeto no se borro", 0, $e);
        } finally {
            fclose($archivo);
        }
    }
    
    public function modificar($nombreClave, $valor, $claveModificada, $valorModificado): bool
    {
        try {
            $retorno = false;
            $objetos = json_decode($this->listar());
            $archivo = fopen($this->archivo, "w");
            foreach ($objetos as $objeto) {
                if ($objeto->$nombreClave == $valor) {
                    $objeto->$claveModificada = $valorModificado;
                    $retorno = true;
                    break;
                }
            }
            fwrite($archivo, json_encode($objetos));
            return $retorno;
        } catch (Exception $e) {
            throw new Exception("El objeto no se pudo modificar", 0, $e);
        } finally {
            fclose($archivo);
        }
    }

    public function obtenerPorId($idKey, $idValue)
    {
        $objects = null;
        if(file_exists($this->archivo))
        {
            $objects = json_decode($this->listar());
        }
        foreach ($objects as $object) {
            if ($object->$idKey == $idValue) {
                return $object;
            }
        }
        return null;
    }

    public function getByAttribute($attrKey, $attrValue)
    {
        try {
            $objects = null;
            if(file_exists($this->archivo))
             {
            $objects = json_decode($this->listar());
            }
            $retorno = array();
            foreach ($objects as $object) {
                if ($object->$attrKey == $attrValue) {
                    array_push($retorno, $object);
                }
            }
            if(count($retorno) > 0){
                return json_encode($retorno);
            }else {
                return null;
            }
        } catch (Exception $e) {
            throw new Exception("El archivo No se listo segun el parametro '$attrKey' ", 0, $e);
        }
    }
    public function getByAttributeCaseInsensitive($attrKey, $attrValue)
    {
        try {
            $objects = null;
           if(file_exists($this->archivo))
            {
                $objects = json_decode($this->listar());
            }
            $retorno = array();
            foreach ($objects as $object) {
                if (strtolower($object->$attrKey) == strtolower($attrValue)) {
                    array_push($retorno, $object);
                }
            }
            if(count($retorno) > 0){
                return json_encode($retorno);
            }else {
                return null;
            }
        } catch (Exception $e) {
            throw new Exception("El archivo No se listo segun el parametro '$attrKey' ", 0, $e);
        }
    }

}

?>