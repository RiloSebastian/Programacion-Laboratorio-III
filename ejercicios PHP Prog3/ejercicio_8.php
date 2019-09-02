<?php

$num=43;

$string= strval($num);
$primerDigito;
$segundoDigito;

echo "$num <br/>";

if($num <60 && $num >20)
{
    switch(substr($string,0,1))
    {
        case '2':
        $primerDigito="veinte";
        break;
        case '3':
        $primerDigito="treinta";
        break;
        case '4':
        $primerDigito="cuarenta";
        break;
        case '5':
        $primerDigito="cincuenta";
        break;
        case '6':
        $primerDigito="sesenta";
        break;
    }
    switch(substr($string,1,1))
    {
        case '0':
        break;
        case '1':
        $segundoDigito="y uno";
        break;
        case '2':
        $segundoDigito="y dos";
        break;
        case '3':
        $segundoDigito="y tres";
        break;
        case '4':
        $segundoDigito="y cuatro";
        break;
        case '5':
        $segundoDigito="y cinco";
        break;
        case '6':
        $segundoDigito="y seis";
        break;
        case '7':
        $segundoDigito="y siete";
        break;
        case '8':
        $segundoDigito="y ocho";
        break;
        case '9':
        $segundoDigito="y nueve";
        break;
    }

    echo"$primerDigito "."$segundoDigito";

}