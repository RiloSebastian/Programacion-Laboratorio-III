<?php
include './clases/alumno.php';
include './clases/materia.php';
include './clases/inscripcion.php';
include './controller/alumnoController.php';
include './controller/materiaController.php';
include './controller/inscripcionController.php';
include './clases/GenericDao.php';
$request = ($_SERVER['REQUEST_METHOD']);
$alumnoController = new AlumnoController();
$materiaController = new MateriaController();
$inscripcionController = new InscripcionController();
try {
    switch ($request) {
        case "POST":
            if (isset($_POST["case"])) {
                switch ($_POST["case"]) {
                    case "cargarAlumno":
                        if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_FILES["foto"])) {
                            $alumnoController->cargarAlumno($_POST["nombre"], $_POST["apellido"], $_POST["email"], $_FILES["foto"]);
                            //echo "<img src='./imagenes/sebastianrilo@gmail.com.jpg'>";
                        } 
                        else {
                            echo "Hubo un error en los datos enviados";
                        }
                        break;
                    case "cargarMateria":
                        if (isset($_POST["nombre"]) && isset($_POST["codigo"]) && isset($_POST["cupo"]) && isset($_POST["aula"])) {
                            $materiaController->cargarMateria($_POST["nombre"], $_POST["codigo"], $_POST["cupo"], $_POST["aula"]);
                        } 
                        else {
                            echo "Hubo un error en los datos enviados";
                        }
                        break;
                    case "inscribirAlumno":
                        if (isset($_POST["nombreAlumno"]) && isset($_POST["apellidoAlumno"]) && isset($_POST["emailAlumno"]) && isset($_POST["nombreMateria"]) && isset($_POST["codigoMateria"])) {
                            $inscripcionController->inscribirAlumno($_POST["nombreAlumno"], $_POST["apellidoAlumno"], $_POST["emailAlumno"], $_POST["nombreMateria"], $_POST["codigoMateria"]);
                        } 
                        else {
                            echo "Hubo un error en los datos enviados";
                        }
                        break;
                    case "modificarAlumno":
                        if (isset($_POST["email"])){
                            $alumnoController->modificarAlumno($_POST["email"], $_POST, $_FILES);
                        } 
                        else {
                            echo "Hubo un error en los datos enviados";
                        }
                }
            } else {
                echo 'error. verificar si el case esta bien escrito';
            }
            break;
        case "GET":
            if (isset($_GET["case"])) {
                switch ($_GET["case"]) {
                    case "consultarAlumno":
                        if(isset($_GET["apellido"])) {
                            echo $alumnoController->consultarAlumno($_GET["apellido"]);
                        } 
                        else {
                            echo 'Indique el apellido';
                        }
                        break;
                    case "borrarAlumno":
                      if(isset($_GET["email"])) {
                          echo $alumnoController->borrarAlumno($_GET["email"]);
                      } 
                      else {
                          echo 'Indique el email';
                      }
                      break;
                      
                     
                    case "inscripciones":
                        if(isset($_GET["codigoMateria"]) && !isset($_GET["emailAlumno"]))
                        {
                            echo $inscripcionController->inscripciones($_GET["codigoMateria"]);
                        }
                        else if(!isset($_GET["codigoMateria"]) && isset($_GET["emailAlumno"]) || isset($_GET["codigoMateria"]) && isset($_GET["emailAlumno"]))
                        {
                            echo $inscripcionController->inscripciones($_GET["emailAlumno"]);
                        }
                        else if(!isset($_GET["codigoMateria"]) && !isset($_GET["emailAlumno"]))
                        {
                            echo $inscripcionController->inscripciones();
                        }
                        break;
                    }
                }
                else {
                    echo 'error. verificar si el case esta bien escrito';
                }
                break;          
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>