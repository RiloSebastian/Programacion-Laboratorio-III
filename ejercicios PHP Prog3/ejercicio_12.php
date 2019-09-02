<?php

$lapicera1= array("color"=>"rojo","marca"=>"bic","trazo"=>"fino","precio"=>19.30);
$lapicera2= array("color"=>"azul","marca"=>"faber castell","trazo"=>"fino","precio"=>25.00);
$lapicera3= array("color"=>"negro","marca"=>"sylvapen","trazo"=>"grueso","precio"=>22.50);

var_dump($lapicera1);
echo "<br/>";
foreach($lapicera1 as $content)
{
    echo "$content <br/>";
}
var_dump($lapicera2);
echo "<br/>";
foreach($lapicera2 as $content)
{
    echo "$content <br/>";
}
var_dump($lapicera3);
echo "<br/>";
foreach($lapicera3 as $content)
{
    echo "$content <br/>";
}

