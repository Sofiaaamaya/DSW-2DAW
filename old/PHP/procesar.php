<?php
    // <========== Variables ==========>

    // Mensaje para saludo o error.
    $mensaje = "";

    // Indica si el mensaje es un error.
    $esError = true;


    // <========== Constantes ==========>

    const longitudNumeroMinima = 9, longitudNumeroMaxima = 15;

    const longitudNombreMinima = 5, longitudNombreMaxima = 20;


    // <========== Expresiones regulares ==========>

    // Campo nombre en formato esperado (solo letras, números y guión bajo "_").
    const patronNombre = '/^[\w\-\.]+[a-zA-Z0-9_]{5,20}$/';

    // Campo número de teléfono en formato esperado (solo números).
    const patronNumero = '/\b[0-9]+\b{9,15}/';

    // Campo email en formato esperado.
    const patronEmail = '/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,7}$/';


    // <========== Main ==========>

    // Condicional para comprobar que se ha llegado a esta página enviando/a través del formulario (y no escribiendo la dirección URL en el navegador).
    if ($_SERVER["REQUEST_METHOD"] !== "POST"){
        $mensajeError = "ERROR: Debes enviar el formulario para analizar un texto.";
    
    } else{
        // Recoge el texto enviado al campo/etiqueta "nombre" por el formulario y lo normaliza eliminando los espacios del principio y del final.
        $nombre = trim($_POST["nombre"] ?? "");

        // Recoge el texto enviado al campo/etiqueta "numero" por el formulario y lo normaliza eliminando los espacios del principio y del final.
        $numero = trim($_POST["numero"] ?? "");

        // Recoge el texto enviado al campo/etiqueta "email" por el formulario y lo normaliza eliminando los espacios del principio y del final.
        $email = trim($_POST["email"] ?? "");

        // Condicional para comprobar que se ha escrito algún texto.
        if ($nombre === ""){
            $mensajeError = "ERROR: El campo/etiqueta \"Nombre completo\" no puede estar vacío.";
        
        } else{
            // <========== Validación y normalización del nombre a mayúsculas ==========>

            // Se abstrae la coincidencia y se normaliza.
            if (preg_match(patronNombre, $nombre, $coincidencias)){
                for ($i = 0; $i < $coincidencias; $i++){ 
                    $nombreNormalizado = $coincidencias[$i];

                    $nombreNormalizado = preg_replace(patronNombre, $nombre, strtoupper($nombre));
                }
            }
        }

        if ($numero === "") $mensajeError = "ERROR: El campo/etiqueta \"Número de teléfono\" no puede estar vacío.";
        
        if ($email === "") $mensajeError = "ERROR: El campo/etiqueta \"Correo electrónico / E-mail\" no puede estar vacío.";
    }
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario - Resultado</title>

        <!-- Icon -->
        <!--<link rel="icon" href="../Images/Icono/calendario.png">-->

        <!-- CSS -->
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    <body>
        <header></header>
        <main>
            <!-- Fecha encontrada: se muestra separada en día, mes y año. -->
            <?php if ($nombre !== ""): ?>
                <p class="exito">
                    <?php echo "Nomre: $nombreNormalizado"; ?>
                    <br>
                    <?php echo "Número de teléfono: $numero"; ?>
                    <br>
                    <?php echo "Correo electrónico / Email: $email"; ?>
                </p>
            <?php endif; ?>

            <!-- Enlace para volver al formulario. -->
            <a href="../index.html">Volver al formulario</a>
        </main>
        <footer></footer>
    </body>
</html>