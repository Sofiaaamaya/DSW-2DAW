<?php
$mensaje = "";

function mensajeError($texto){
  echo "
    <div class=\"alert theme-danger\" role=\"alert\">
      <p>[Error] El campo {$texto} debe ser válido/no puede estar vacío.</p>
    </div>
  ";
}

echo "
  <!DOCTYPE html>
  <html lang=\"es\">
  <head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Error</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe\" crossorigin=\"anonymous\">
    <scrit type=\"module\" src=\"https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL\" crossorigin=\"anonymous\"></script>

";

if (!empty($_POST['nombre']))
  $mensaje .= "¡Hola, {$_POST['nombre']}! ";
else 
  mensajeError("nombre");

if (!empty($_POST['edad']))
  $mensaje .= "Tienes {$_POST['edad']} años ";
else
  mensajeError("edad");

if (!empty($_POST['email']))
  $mensaje .= "y tu correo electrónico es {$_POST['email']}";
else
  mensajeError("email");

echo "<a href=\"formulario.html\"><button class=\"btn-solid btn-styled theme-secondary\">Volver</button></a>
";

if (!empty($_POST['nombre']) && !empty($_POST['edad']) && !empty($_POST['email'])){
echo "
<!DOCTYPE html>
<html lang=\"es\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>Formulario de Registro</title>
  <link rel=\"stylesheet\" href=\"styles.css\">

  <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe\" crossorigin=\"anonymous\">
  <scrit type=\"module\" src=\"https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL\" crossorigin=\"anonymous\"></script>

</head>
<body>
  <div class=\"container\">
<div class=\"alert theme-accent\" role=\"alert\">
  <p>{$mensaje}</p>
</div>
";

}
?>