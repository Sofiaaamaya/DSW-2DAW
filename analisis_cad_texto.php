<?php

$texto = "Programar en PHP es divertido";

$numeroCaracteres = strlen($texto);
$numeroPalabras = str_word_count($texto);

$primeraLetra = substr($texto,0,1);
$ultimaLetra = substr($texto,-1);
$cadenaInvertida = strrev($texto);



echo "Para el texto: \"{$texto}\" <br /><br />Número de caracteres: {$numeroCaracteres} <br />Número de palabras: {$numeroPalabras} <br />Primera letra: {$primeraLetra} <br />Última letra: {$ultimaLetra} <br/>Cadena invertida: {$cadenaInvertida}";