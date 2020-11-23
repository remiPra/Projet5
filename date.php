<?php

$str = "Jeudi 11 Juin 2020";
$f = explode(" ",$str);

$day = $f[1];

$mois = array("data","Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
$month = array_search($f[2],$mois);
$year = $f[3];

$str = "18 : 00";
$g = explode(" ",$str);

$hour = $g[0];
$minutes = $g[2];
$secondes = 00;

$d=mktime($hour,$minutes,$secondes, $month, $day, $year);
echo "Created date is " . date("Y-m-d h:i:sa", $d);