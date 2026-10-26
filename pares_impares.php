<?php
$limite = 23;
$totalPares = 0;
$totalImpares = 0;

for ( $i = 1; $i <= $limite; $i++){

  $i % 2 == 0 ? $totalPares ++ : $totalImpares++; 
  // if ($i % 2 == 0){
  //   $totalPares ++;
  // } else {
  //   $totalImpares++;
  // }
}
echo "Total de pares: {$totalPares} <br /> Total de impares: {$totalImpares}";
