<?php

$dni = '78769494';
$resto = $dni % 23;

define("CALCULO_LETRA_DNI", "TRWAGMYFPDXBNJZSQVHLCKE");

$letra_nif = CALCULO_LETRA_DNI[$resto];

echo "El NIF asociado al dni {$dni} es {$dni}{$letra_nif}";


