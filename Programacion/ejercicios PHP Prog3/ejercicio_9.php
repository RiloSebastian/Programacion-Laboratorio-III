<?php

$vec = array();
$total=0;
$prom;

for($i=0;$i<4;$i++)
{
    array_push($vec,rand(0,10));
    $total+=$vec[$i];
}

$prom=$total/count($vec);
echo "$prom";
if($prom >6)
{
    echo " es mayor a 6";
}
else if($prom == 6)
{
    echo " es igual a 6";
}
else
{
    echo " es menor a 6";
}

