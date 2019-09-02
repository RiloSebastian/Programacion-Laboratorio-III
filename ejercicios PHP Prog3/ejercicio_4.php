<?php

$Resultado=0;
$cantNumeros=0;
$numero=1;

do{
    $Resultado+= $numero;
    echo("$numero <br/>");
    $numero++;
    $cantNumeros++;
}while(($Resultado+$numero)<=1000);

echo("numero: $Resultado <br/> cantidad de numeros: $cantNumeros");