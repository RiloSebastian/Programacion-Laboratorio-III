<?php

$a=4;
$b=1;
$c=2;

echo("a: $a <br/> b: $b <br/> c: $c <br/>");

if(($a < $b && $b < $c)||($c < $b && $b < $a)){
    echo("el numero del medio es: $b");
}
else if(($b < $a && $a < $c)|| ($c < $a && $a < $b)){
    echo("el numero del medio es: $a");
}
else if(($a < $c && $c < $b) || ($b < $c && $c < $a)){
    echo("el numero del medio es: $c");
}
else{
    echo("no hay un numero del medio");
}