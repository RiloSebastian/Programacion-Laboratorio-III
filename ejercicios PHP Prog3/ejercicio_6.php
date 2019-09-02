<?php

$a=2;
$b=4;
$operador= '/';

switch ($operador)
{
    case '+':
    $resultado= $a+$b;
    break;
    case '-':
    $resultado= $a-$b;
    break;
    case '/':
    $resultado= $a/$b;
    break;
    case '*':
    $resultado= $a*$b;
    break;
}

echo "a: $a <br/> b: $b <br/> operador: $operador <br/> resultado: $resultado";

