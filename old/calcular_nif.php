<?php

$dni = '78551004';

$resto = $dni % 23;
                           #01234567..
define("CALCULO_LETRA_DNI","TRWAGMYFPDXBNJZSQVHLCKE");

$letra_nif = CALCULO_LETRA_DNI[$resto];

echo "EL NIF asociado al dni {$dni} es {$dni}{$letra_nif}";