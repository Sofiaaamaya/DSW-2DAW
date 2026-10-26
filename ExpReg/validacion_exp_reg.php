<?php
$cadena = $_POST['cadena'];

$patron_fecha = "/^(0[0-9]{1}|1[0-9]{1}|2[0-9]{1}|3[01]{1})\/(0[1-9]{1}|1[012]{1})\/(\d{4})/";

$extraccionFecha = $busquedaAdd = $mensajeError = "";

if (!empty($cadena)){
  if (preg_match($patron_fecha,$cadena,$coincidencia)){
    $extraccionFecha = preg_split("/\//", $cadena);
    echo "
    <div class=\"alert theme-accent\" role=\"alert\">
      <p>{$mensaje}</p>
    </div>
    ";
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validación y extracción de datos con expresiones regulares</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
  <scrit type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>

</head>
<body>
  <div class="container">
    <form action="/" method="post">
      <div class="mb-3 form-field">
        <label for="exampleInputText" class="form-label">Cadena de Texto</label>
        <input type="text" class="form-control" id="exampleInputText" aria-describedby="textHelp" name="cadena">
        <div id="emailHelp" class="form-text">Escribe cualquier cosa...</div>
      </div>
      <button type="submit" class="btn-solid theme-primary">Enviar</button>
    </form>
  </div>
  
</body>
</html>