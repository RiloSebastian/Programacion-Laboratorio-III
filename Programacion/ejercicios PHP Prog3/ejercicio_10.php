<?php
$vec= array();

echo "------------------- for ----------------- <br/>";

for($i=0;$i<10;$i++)
{
    array_push($vec,rand(0,100));
    if(!($vec[$i]%2)==0)
    {
        echo " $vec[$i] <br/>";
    }
}

echo "------------------- while ----------------- <br/>";

$i=0;
while($i<10)
{
    if(!($vec[$i]%2)==0)
    {
        echo " $vec[$i] <br/>";
    }
    $i++;
}

echo "------------------- foreach ----------------- <br/>";

foreach($vec as $value)
{
    if(!($value%2)==0)
    {
        echo " $value <br/>";
    }
}