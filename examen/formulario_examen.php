<?php

$email = $_POST['email'] ?? '';
$telf = $_POST['telf'] ?? '';
$nombre = $_POST['nombre'] ?? '';

$patron_email = "/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2}$/";
$patron_telf = "/[0-9]{9}/";
$patron_nombre = "/^[a-zA-Z]\d{5}/";



$_estiloserror_email = $_estilos_error_nombre = $_estiloserror_telf = "";


$mensaje = "";

$errores = false;


if(empty($nombre)  && strlen($telf) >= 5 && strlen($telf) <= 20 && !preg_match($patron_nombre, $nombre))
{
    $_estilos_error_nombre = '
        #idNombre label{
            color:#FF0000;
        }
        #idNombre input{
            border-color:#FF0000;
        }

        #idNombre .form-text{
            display:none;
        }
    
    ';

    $errores = true;
}

if(empty($email) && !preg_match($patron_email,$email))
{
    $_estilos_error_email = '
        #idEmail label{
            color:#FF0000;
        }
        #idEmail input{
            border-color:#FF0000;
        }
        #idEmail .form-text{
            display:none;
        }
    
    ';
    $errores = true;
}

if(!is_numeric($telf) && strlen($telf) >= 9 && strlen($telf) <= 15 && !preg_match($patron_telf,$telf) )
{
    $_estilos_error_telf = '
        #idTelf label{
            color:#FF0000;
        }
        #idTelf input{
            border-color:#FF0000;
        }
        #idTelf .form-text{
            display:none;
        }
    
    ';
    $errores = true;
}

if (!$errores)
{
    $mensaje = "
        <br />
        <div class=\"alert theme-success\" role=\"alert\">
            <p>Enviado con éxito.</p>
        </div>
    ";
}




?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Registro</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
  <scrit type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
  <style type="text/css">
        <?php if($errores == true)
            echo $_estilos_error_nombre 
               . $_estilos_error_email
               . $_estilos_error_telf
            ;   
        ?>

  </style>


</head>
<body>
  <div class="container">
  <form method="post">
    <fieldset>
      <?php if(!$errores) echo $mensaje ?>

      <legend>Registro de usuario</legend>
      <div class="mb-3">
        <label for="email" id="idEmail" class="form-label">Email</label>
        <input type="text" id="idEmail" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email..">
        <div id="emailHelp" class="form-text">Introduce tu Email.</div>
      </div>

      <div class="mb-3 form-field" >
          <label for="fieldText" id="idNombre" class="form-label">Nombre</label>
          <input name="nombre" id="idNombre" type="text" class="form-control" id="fieldText" placeholder="Nombre..">
          <div id="nombreHelp" class="form-text"> Introduce tu nombre de usuario.</div>
      </div>

      <div class="mb-3">
        <label for="edad" id="idTelf" class="form-label">Teléfono</label>
        <input type="text" id="idTelf" class="form-control" name="telf" placeholder="928238238..">
        <div id="edadHelp" class="form-text">Introduce tu número de teléfono móvil.</div>
      </div>
      
      <input class="btn-solid theme-primary" type="submit" value="Enviar" />

    </fieldset>
  </form>
  </div>
</body>
</html>