<?php


$limite = 20;



// $i = 1;

// while ($i <= $limite )
// {


//     $i++;
// }


$totalPares   = 0;
$totalImpares = 0;

for($i=1;$i<=$limite;$i++)
{
    /*
    if ($i % 2 == 0)
        $totalPares++;
    else
        $totalImpares++;    
    */

    $i % 2 == 0 ? $totalPares++ : $totalImpares++;  
  
    
}


echo "Total de pares: {$totalPares} Total de impares: {$totalImpares}";