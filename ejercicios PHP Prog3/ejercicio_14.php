<?php

$lista = array('Animales' =>array("Perro","Gato","Raton","Araña"), 
'Fechas'   =>array("1986","1996","2015","78","86"),
'Lenguajes'=>array("php","mysql","html15","typescript","ajax"));


echo $lista['Animales'][0] ."<br> <br>"; 
                            
foreach($lista as $cont=>$subCont)
{
    echo $cont.": <br>";
    foreach($subCont as $info)
    {
        echo $info ."<br>";
    }
    echo "<br>";
}
