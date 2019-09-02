<?php

$fecha= strtotime(date('d-m-Y H:i:00',time()));

echo date('d-m-Y H:i:s')." <br/>";

if($fecha > strtotime("21-3-2019 00:00:00") && $fecha < strtotime("21-6-2019 00:00:00"))
{
    echo" es otoño";
}
else if($fecha > strtotime("21-6-2019 00:00:00") && $fecha < strtotime("21-9-2019 00:00:00"))
{
    echo " es invierno";
}
else if($fecha > strtotime("21-9-2019 00:00:00") && $fecha < strtotime("21-12-2019 00:00:00"))
{
    echo " es primavera";
}
else if($fecha > strtotime("21-12-2019 00:00:00") && $fecha < strtotime("21-3-2020 00:00:00"))
{
    echo " es verano";
}
