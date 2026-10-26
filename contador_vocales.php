<?php

$cadena = "Programar en PHP es divertido";
$vocales = "aeiou";
$contadorVocales = 0;

for ( $i = 0; $i < strlen($cadena); $i++){
  $letra = strtolower($cadena)[$i];
  //echo $letra . "<br />";
  for($x = 0; $x < strlen($vocales); $x++){
    $vocal = $vocales[$x];
    //echo $vocal . "<br />";
    if($letra == $vocal){
      $contadorVocales++;
    }
  }
}

echo "<strong>Cadena:</strong> \"{$cadena}\"<br />". "<strong>Total vocales:</strong> {$contadorVocales}";
