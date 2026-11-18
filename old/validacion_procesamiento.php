<?php

    $mensaje = "";


    $formulario = "<form action=\"/validacion_procesamiento.php\" method=\"post\">
            <input type=\"hidden\" name=\"paso\" value=\"1\" />
            <div class=\"form-field\" id=\"idNombreUsuario\">
                <label for=\"fieldText\" class=\"form-label\">Nombre de usuario</label>
                <input name=\"nombreUsuario\" type=\"text\" class=\"form-control\" id=\"fieldText\" placeholder=\"Nombre..\">
                <div class=\"form-text\">
                    Introduce un nombre de usuario
                </div>
            </div>
            <div class=\"form-field\" id=\"idTelefono\">
                <label for=\"fieldText\" class=\"form-label\">Teléfono</label>
                <input name=\"telefono\" type=\"number\" class=\"form-control\" id=\"fieldText\" placeholder=\"Número teléfono..\">
                <div class=\"form-text\">
                    Introduce un número de teléfono
                </div>
            </div>
            <div class=\"form-field\" id=\"idEmail\">
                <label for=\"fieldText\" class=\"form-label\">Correo electrónico</label>
                <input name=\"email\" type=\"email\" class=\"form-control\" id=\"fieldText\" placeholder=\"ejemplo@email.com..\">
                <div class=\"form-text\">
                    Introduce un correo electrónico
                </div>
            </div>

            <input class=\"btn-solid theme-primary\" type=\"submit\" value=\"Enviar\" />
        </form>";

        $patronUsuario = "/^[a-zA-z]{1}[\w]{4,19}$/";
        $patronTelefono = "/^\d{9, 15}$/";
        $patronEmail = "/^[a-z0-9]{4,20}[@]{1}[a-z]{5,15}[\.]{1}[a-z]{2,10}$/";

        if ($_POST['paso'] == 1) {

            $errores = false;

            if(!empty($_POST['nombreUsuario']) || !preg_match_all($patronUsuario, $_POST['nombreUsuario'])) {

                $_estilos_error_nombre_usuario = '
                #idNombreUsuario label{
                    color:#FF0000;
                }
                #idNombreUsuario input{
                    border-color:#FF0000;
                }

                #idNombreUsuario span{
                    display:block;
                }

                #idNombreUsuario .form-text{
                    display:none;
                }
            
            ';

                $errores = true;
                
            }

            if(!empty($_POST['telefono']) || !preg_match_all($patronTelefono, $_POST['telefono'])){

                $_estilos_error_telefono = '
                #idTelefono label{
                    color:#FF0000;
                }
                #idTelefono input{
                    border-color:#FF0000;
                }

                #idTelefono span{
                    display:block;
                }

                #idTelefono .form-text{
                    display:none;
                }
            
            ';

                $errores = true; 
            }

            if(!empty($_POST['email']) || !preg_match_all($patronEmail, $_POST['email'])){
                
                $_estilos_error_email =  '
                #idEmail label{
                    color:#FF0000;
                }
                #idEmail input{
                    border-color:#FF0000;
                }

                #idEmail span{
                    display:block;
                }

                #idEmail .form-text{
                    display:none;
                }
            
            ';

                $errores = true;

            }

            if(!$errores) {
                $mensaje = "
                    </br>
                    <div> Los datos son válidos y han sido procesados. Su nombre de usuario es {$_POST['nombreUsuario']}, su teléfono {$_POST['telefono']} y su correo electrónico {$_POST['email']}</div>
                ";
            }
          
        }

   
        
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>

    <style type="text/css">
        html,body { 
            background:#ccc;
            height:100%;
    
        }

        .container{
            background:#FFF;
            height:100%;
            display:block;

        }

        span {display:none; color:#ff0000;}

        

        <?php 
            echo $_estilos_error_nombre_usuario 
               . $_estilos_error_telefono
               . $_estilos_error_email
            ; 
                 
        ?>

    </style>
</head>
<body>
    <div class="container">
        <?php

        if ($mensaje) {
            echo $mensaje;
        }
        else {
            echo $formulario;
        }

        ?>
    </div>
</body>
</html>