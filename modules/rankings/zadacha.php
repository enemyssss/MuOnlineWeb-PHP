<?php

$stoinost = 50; // int a = 50

// Ако стойноста е по-малка или равна на 50 изпълява първият 1 иф
if($stoinost <= 50){  // стойност 15% от 50
$zadacha= 50*15; // стойност 50 - 15% от 50
$otgovor = $zadacha /100;
   echo $otgovor; // принтира готовата стойност
}


if($stoinost <= 75){ 
$zadacha = ($stoinost % 20);
$rezultat = $stoinost - $zadacha;

   echo $rezultat; 
}

if ($stoinost >= 75){ 
$zadacha = ($stoinost % 25);
$rezultat = $stoinost - $zadacha;

   echo $rezultat; 
}

?>