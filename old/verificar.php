<?php

function comprobar_valor($valor): bool {
    if ($valor != NULL) {
        return true;
    } else {
        return false;
    }
}

$email = $_POST['email'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];

// Patrones de expresiones regulares
$patron_email = "^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,7}/$";
$patron_nombre = "^[A-Z]\w{5-20}/$";
$patron_telefono = "\d{9-15}/";

$email_verificado = FALSE;
$nombre_verificado = FALSE;
$telefono_verificado = FALSE;

if (!comprobar_valor($email)) {
    echo("<br>[!] Campo 'email' vacío.<br><");
} else {
    if (!preg_match($patron_email, $email)) {
        echo("<br>[!] Campo 'email' no válido.<br>");
    } else {
        $email_verificado = TRUE;
    }
}

if (!comprobar_valor($telefono)) {
    echo("<br>[!] Campo 'telefono' vacío.<br>");
} else {
    if (!preg_match($patron_telefono, $telefono)) {
        echo("<br>[!] Campo 'telefono' no válido.<br>");
    } else {
        $telefono_verificado = TRUE;
    }
}

if (!comprobar_valor($nombre)) {
    echo("<br>[!] Campo 'telefono' vacío.<br>");
} else {
    if (!preg_match($patron_telefono, $telefono)) {
        echo("<br>[!] Campo 'nombre' no válido.<br>");
    } else {
        $nombre_verificado = TRUE;
        $nombre_mayusculas = strtoupper($nombre);
        preg_replace($nombre, $nombre_mayusculas, $nombre);
    }
}

if ($email_verificado && $telefono_verificado && $nombre_verificado) {
    echo("Los datos intrducidos tienen un formato válido.");   
}

?>