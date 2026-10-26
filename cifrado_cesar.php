<?php
$texto = "¡Programar en PHP es divertidísimo, Ñandú!";
$k = 7;

$alfabeto = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZ';
$longitudAlfabeto = mb_strlen($alfabeto, 'UTF-8');

/****************************************/
/* 1. NORMALIZAR EL TEXTO               */
/****************************************/
$normalizado = $texto;
$normalizado = str_replace('Á', 'A', $normalizado);
$normalizado = str_replace('É', 'E', $normalizado);
$normalizado = str_replace('Í', 'I', $normalizado);
$normalizado = str_replace('Ó', 'O', $normalizado);
$normalizado = str_replace('Ú', 'U', $normalizado);
$normalizado = str_replace('Ü', 'U', $normalizado);
$normalizado = str_replace('á', 'a', $normalizado);
$normalizado = str_replace('é', 'e', $normalizado);
$normalizado = str_replace('í', 'i', $normalizado);
$normalizado = str_replace('ó', 'o', $normalizado);
$normalizado = str_replace('ú', 'u', $normalizado);
$normalizado = str_replace('ü', 'u', $normalizado);

/****************************************/
/* 2. NORMALIZAR EL DESPLAZAMIENTO      */
/****************************************/
$desplazamiento = $k % $longitudAlfabeto;
if ($desplazamiento < 0) {
    $desplazamiento += $longitudAlfabeto;
}

/****************************************/
/* 3. CIFRAR                            */
/****************************************/
$cifrado = '';
for ($i = 0; $i < mb_strlen($normalizado, 'UTF-8'); $i++) {
    $caracter = mb_substr($normalizado, $i, 1, 'UTF-8');
    $mayuscula = mb_strtoupper($caracter, 'UTF-8');
    $posicion = mb_strpos($alfabeto, $mayuscula, 0, 'UTF-8');

    if ($posicion !== FALSE) { // Lo encuentra en el alfabeto
        $nuevaPosicion = ($posicion + $desplazamiento) % $longitudAlfabeto;
        $nuevoCaracter = mb_substr($alfabeto, $nuevaPosicion, 1, 'UTF-8');

        if ($caracter == mb_strtolower($caracter, 'UTF-8')) {
            $nuevoCaracter = mb_strtolower($nuevoCaracter, 'UTF-8');
        }
        $cifrado .= $nuevoCaracter;
    } else { // No lo encuentra, mantiene el original
        $cifrado .= $caracter;
    }
}

echo "La frase cifrada de <b>{$texto}</b> es la siguiente: <b>{$cifrado}</b>";

/****************************************/
/* 4. DESCIFRAR                          */
/****************************************/
$descrifrado = '';
$desplazamientoDescrifrado = -$desplazamiento;

for ($i = 0; $i < mb_strlen($cifrado, 'UTF-8'); $i++) {
    $caracter = mb_substr($cifrado, $i, 1, 'UTF-8');
    $mayuscula = mb_strtoupper($caracter, 'UTF-8');
    $posicion = mb_strpos($alfabeto, $mayuscula, 0, 'UTF-8');

    if ($posicion !== FALSE) { // Lo encuentra en el alfabeto
        $nuevaPosicion = ($posicion + $desplazamientoDescrifrado) % $longitudAlfabeto;
        if ($nuevaPosicion < 0) {
            $nuevaPosicion += $longitudAlfabeto;
        }
        
        $nuevoCaracter = mb_substr($alfabeto, $nuevaPosicion, 1, 'UTF-8');

        if ($caracter == mb_strtolower($caracter, 'UTF-8')) {
            $nuevoCaracter = mb_strtolower($nuevoCaracter, 'UTF-8');
        }
        $descrifrado .= $nuevoCaracter;
    } else { // No lo encuentra, mantiene el original
        $descrifrado .= $caracter;
    }
}

echo "<br /> El texto descifrado es: <b>{$descrifrado}</b>";
