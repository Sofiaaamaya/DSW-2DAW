/**Entrada de datos:
Pide al usuario que introduzca:

Una dirección de correo electrónico

Un número de teléfono

Un nombre de usuario

Validación con expresiones regulares:
Verifica que cada dato cumpla con las siguientes condiciones:

Correo electrónico: Debe tener un formato válido, por ejemplo, nombre@dominio.com.

Número de teléfono: Solo dígitos, con una longitud mínima de 9 y máxima de 15 caracteres.

Nombre de usuario: Debe comenzar con una letra y puede contener letras, números y guiones bajos (_). Su longitud debe ser entre 5 y 20 caracteres.

Gestión de errores:
Si alguno de los campos no cumple con los criterios, muestra un mensaje de error específico para ese campo.

Confirmación y procesamiento:
Si todos los datos son válidos, muestra un mensaje de confirmación. Además, transforma el nombre de usuario convirtiendo todas las letras minúsculas en mayúsculas, utilizando preg_replace.

Puntos extra (opcional):
Añade la validación de una URL que debe comenzar con http:// o https://. */

<?php

$correo = $_POST['correo'] ?? 'No definido';
$numero = $_POST['numero'] ?? 'No definido';
$nombre = $_POST['nombre'] ?? 'No definido';

$patronCorreo = "/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,7}$/";
$patronNumero = "/[0-9]{9,15}/";
$patronNombre = "/^\w{5,20}$/"


if(preg_match($patronCorreo,$_POST['correo'] )){
    
}
?>