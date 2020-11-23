<?php
//$status = $info[0]['status'];
//$dateDeliveryOrder = $info[0]['dateDeliveryOrder'];
$status = "rerere";
$numberCommand = "dfsfsf";

//$text= $status + $numberCommand;
$date=strtotime("2020-06-14 17:30:00");
$format = date("Ymd",$date);
$formatA = date("his",$date);
//echo $format;
//echo $formatA;
echo "</br>";
echo '<a href="https://calendar.google.com/calendar/r/eventedit?text='.$status.'+de+la+commande+n'
        .$numberCommand.'&dates='
        .$format.'T'
        .$formatA.'Z/'
        .$format.'T'
        .$formatA.'Z&details&location&trp=false">button</a>'; 

// https://calendar.google.com/calendar/r/eventedit?
//     text=Remi
//     dates=$yeay$month$dayT120000Z/20141106T120000Z&
//     details&
//     location&trp=false