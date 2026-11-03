<?php




$cadena = "Programar en PHP es divertido";

$numero_caracteres = strlen(trim(str_replace(' ','',$cadena)));
$numero_palabras   = str_word_count($cadena);
$primera_letra     = substr($cadena,0,1);
$ultima_letra      = substr($cadena,-1);
$cadena_invertida  = strrev($cadena);


echo "
Para el texto: <b>\"{$cadena}\"</b>:<br />
Número de caracteres: {$numero_caracteres}<br />
Número de palabras: {$numero_palabras}<br />
Primera letra: {$primera_letra}<br />
Última letra: {$ultima_letra}<br />
Cadena invertida: {$cadena_invertida}
";
