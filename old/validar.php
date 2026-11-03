<?php

$bootstrap = '<link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">';
echo $bootstrap;

function limpiar($valor){
    return htmlspecialchars(trim($valor ?? ''));
}

$campos = ['nombre', 'telefono', 'correo'];
$faltantes = [];

foreach ($campos as $campo){
    if (limpiar($_POST[$campo] ?? '') === ''){
        $faltantes[] = $campo;
    }
}

if (count($faltantes) > 0){
    echo '<div class="alert theme-primary" role="alert">';
    echo "<p>Error: Falta rellenar el/los campo(s): " . implode(', ', $faltantes) . ".</p>";
    echo '</div>';
} else {
    $nombre = limpiar($_POST['nombre']);
    $telefono   = limpiar($_POST['telefono']);
    $correo = limpiar($_POST['correo']);

    // Nombre de usuario: Debe comenzar con una letra y puede contener letras, números y guiones bajos (_). Su longitud debe ser entre 5 y 20 caracteres.
    $patronNombre = "/^[a-zA-Z]\w{4,19}$/";

    if (preg_match($patronNombre, $nombre, $nombreValido) === 1){
        echo '<div class="alert theme-primary" role="alert">';
        echo "<p>Telefono encontrada: {$nombreValido[0]}</p>";
        echo '</div>';
    } else {
        echo '<div class="alert theme-primary" role="alert">';
        echo "<p>El nombre introducido no es valido.</p>";
        echo '</div>';
        exit(1);
    }

    // Número de teléfono: Solo dígitos, con una longitud mínima de 9 y máxima de 15 caracteres.
    $patronTelefono = "/^\d{9,15}$/";

    if (preg_match($patronTelefono, $telefono, $telefonoValido) === 1){
        echo '<div class="alert theme-primary" role="alert">';
        echo "<p>Telefono encontrada: {$telefonoValido[0]}</p>";
        echo '</div>';
    } else {
        echo '<div class="alert theme-primary" role="alert">';
        echo "<p>El telefono introducido no es valido.</p>";
        echo '</div>';
        exit(1);
    }

    // Correo electrónico: Debe tener un formato válido, por ejemplo, nombre@dominio.com.
    $patronCorreo = "/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,7}$/";

    if (preg_match($patronCorreo, $correo, $correoValido) === 1){
        echo '<div class="alert theme-primary" role="alert">';
        echo "<p>Correo encontrada: {$correoValido[0]}</p>";
        echo '</div>';
    } else {
        echo '<div class="alert theme-primary" role="alert">';
        echo "<p>El correo introducido no es valido.</p>";
        echo '</div>';
        exit(1);
    }
}
?>