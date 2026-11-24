<?php

    require_once "includes/general.php";


    echo Template::header('Lanzarote');

    $usuario = new Usuario();

    switch($_GET['seccion'])
    {
        case 'usuarios':
            //Cargamos la sección usuarios

            $url_form = '/usuarios/'.$_GET['oper'];

            
            

            switch($_GET ['oper'])
            {

                case 'baja':

                    $operacion = Idioma::lit('eliminacion');


                    $id = $_GET['pagina'];


                   


                case 'modi':


                    $operacion = empty($operacion)? Idioma::lit('modificacion'): $operacion;

                    $id = $_GET['pagina'];

                    $url_form .= '/'.$id;

                    

                    


                case 'alta':
                    $operacion = empty($operacion)? Idioma::lit('alta'): $operacion;

                    

                    define("OPERACION", $operacion);

                    $boton_alta = "<input type=\"submit\" class=\"theme-primary btn-solid btn-styled\" value=\"". OPERACION ." de usuario\" />";
                    
                    $errores = false;
                    $disabled = $_GET['oper'] == 'baja'?  " readonly=\"readonly\" " : '';

                    if($_POST['paso'] == '1')
                    {

                        $_texto_errores = '';

                        if (strlen($_POST['nombre']) < 3)
                        {

                            $_error_nombre = 'error';
                            $_texto_errores = '<p>- '. sprintf(Idioma::lit('error_caracteres'),'nombre','3') .'.</p>';
                            
                            $errores = true;
                        }

                        if (strlen($_POST['apellido1']) < 3)
                        {

                            $_error_apellido1 = 'error';
                            $_texto_errores .= '<p>- '. sprintf(Idioma::lit('error_caracteres'),'Primer Apellido','3') .'.</p>';
                            
                            $errores = true;
                        }
                        
                        if (strlen($_POST['apellido2']) < 3)
                        {

                            $_error_apellido2 = 'error';
                            $_texto_errores .= '<p>- '. sprintf(Idioma::lit('error_caracteres'),'Segundo Apellido','3') .'.</p>';
                            
                            $errores = true;
                        }
                        

                        if (!fecha_valida($_POST['fecha_nacimiento']))
                        {

                            $_error_fecha_nacimiento = 'error';
                            $_texto_errores .= '<p>- '. sprintf(Idioma::lit('error_formato_invalido'),'Fecha Nacimiento') .'.</p>';
                            
                            $errores = true;
                        }

                        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                        {

                            $_error_email = 'error';
                            $_texto_errores .= '<p>- '. sprintf(Idioma::lit('error_formato_invalido'),'E-mail') .'.</p>';
                            
                            $errores = true;
                        }

                        if ($errores)
                        {
                            $mensajes_errores = "
                                <div class=\"info_errores mb-5 mt-5\" role=\"alert\">
                                {$_texto_errores}
                                </div>
                            
                            ";
                        }
                        else
                        {
                            $mensaje_exito = "
                                <div class=\"alert theme-success  mb-5 mt-5\" role=\"alert\">
                                    <p>". Idioma::lit('operacion_exito') ."</p>
                                </div>
                            ";
                            $boton_alta = '';

                            $disabled = " disabled=\"disabled\" ";


                            switch($_GET['oper'])
                            {
                                case 'alta':
                                    
                                    $datos_insertar = array();
                                    $datos_insertar['nombre']           = $_POST['nombre'];
                                    $datos_insertar['apellido1']        = $_POST['apellido1'];
                                    $datos_insertar['apellido2']        = $_POST['apellido2'];
                                    $datos_insertar['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
                                    $datos_insertar['email']            = $_POST['email'];


                                    $usuario->insertar($datos_insertar);

                                break;
                                case 'modi':

                                    $datos_modificar = array();
                                    $datos_modificar['nombre']           = $_POST['nombre'];
                                    $datos_modificar['apellido1']        = $_POST['apellido1'];
                                    $datos_modificar['apellido2']        = $_POST['apellido2'];
                                    $datos_modificar['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
                                    $datos_modificar['email']            = $_POST['email'];

                                    $usuario->modificar($datos_modificar,$id);
                                break;

                                case 'baja':


                                    $usuario->eliminar($_POST['id']);


                                    ob_clean();
                                    header("Location: /usuarios/listado/0");
                                    exit;


                                break;
                            }
                            
                        }



                    }
                    elseif(!empty($id))
                    {
                        $_POST = $usuario->recuperar($id);

                    }



                    echo "
                        <a href=\"/usuarios/listado/0\" class=\"btn-solid theme-info mb-5\">Volver <i class=\"bi bi-arrow-return-left\"></i></a>
                        <h1>". OPERACION ." de usuarios</h1>
                        {$mensajes_errores}
                        {$mensaje_exito}
                        <form action=\"{$url_form}\" method=\"POST\">

                            <input type=\"hidden\" name=\"paso\" value=\"1\" />

                            <input type=\"hidden\" name=\"id\" value=\"{$_POST['id']}\" />

                            <div class=\"form-field mb-4 {$_error_nombre}\">
                                <label for=\"nombreID\" class=\"form-label\">". Idioma::lit('nombre') ."</label>
                                <input {$disabled} type=\"text\" name=\"nombre\" class=\"form-control\" id=\"nombreID\" value=\"{$_POST['nombre']}\" placeholder=\"". sprintf(Idioma::lit('introduce_tu'),'nombre') ."\">
                            </div>

                            <div class=\"form-field mb-4 {$_error_apellido1}\">
                                <label for=\"apellido1ID\" class=\"form-label\">". Idioma::lit('apellido1') ."</label>
                                <input {$disabled} type=\"text\" name=\"apellido1\" class=\"form-control\" id=\"apellido1ID\" value=\"{$_POST['apellido1']}\" placeholder=\"". sprintf(Idioma::lit('introduce_tu'),'Primer Apellido') ."\">
                            </div>

                            <div class=\"form-field mb-4 {$_error_apellido2}\">
                                <label for=\"apellido2ID\" class=\"form-label\">". Idioma::lit('apellido2') ."</label>
                                <input {$disabled} type=\"text\" name=\"apellido2\" class=\"form-control\" id=\"apellido2ID\" value=\"{$_POST['apellido2']}\" value=\"{$_POST['nombre']}\" placeholder=\"". sprintf(Idioma::lit('introduce_tu'),'Segundo apellido') ."\">
                            </div>

                            <div class=\"form-field mb-4 {$_error_fecha_nacimiento}\">
                                <label for=\"fecha_nacimientoID\" class=\"form-label\">". Idioma::lit('fecha_nacimiento') ."</label>
                                <input {$disabled} type=\"date\" name=\"fecha_nacimiento\" class=\"form-control\" id=\"fecha_nacimientoID\" value=\"{$_POST['fecha_nacimiento']}\" >
                            </div>

                            <div class=\"form-field mb-4 {$_error_email}\">
                                <label for=\"emailID\" class=\"form-label\">". Idioma::lit('email') ."</label>
                                <input {$disabled} type=\"email\" name=\"email\" class=\"form-control\" id=\"emailID\" value=\"{$_POST['email']}\" placeholder=\"". Idioma::lit('email_generico') ."\">
                            </div>

                            {$boton_alta}


                        </form>
                        

                    ";


                break;

                default:

                    $datos_usuarios = $usuario->listado([
                        'limit'  => TOTAL_PAGINAS_LISTADO
                       ,'offset' => $_GET['pagina'] * TOTAL_PAGINAS_LISTADO

                    ]);

                    $registros       = $datos_usuarios['registros'];
                    $total_registros = $datos_usuarios['total_registros'];

                

                    echo "
                    <a href=\"/usuarios/alta\" class=\"theme-primary btn-solid btn-styled\">
                        ". Idioma::lit('alta_usuario') ." <i class=\"bi bi-plus-lg\"></i>
                    </a>
                    
                    <table style=\"margin-top:15px\" class=\"table\">
                        <thead>
                            <tr>
                                <th scope=\"col\">#</th>
                                <th scope=\"col\">ID</th>
                                <th scope=\"col\">". Idioma::lit('nombre') ."</th>
                                <th scope=\"col\">". Idioma::lit('apellido1') ."</th>
                                <th scope=\"col\">". Idioma::lit('apellido2') ."</th>
                                <th scope=\"col\">". Idioma::lit('fecha_nacimiento') ."</th>
                                <th scope=\"col\">". Idioma::lit('email') ."</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";




                    foreach($registros as $id => $registro)
                    {

                        $modificacion = "<a class=\"btn-solid theme-primary\" href=\"/usuarios/modi/{$registro['id']}\"><i class=\"bi bi-pencil-square\"></i></a>";
                        $baja         = "<a class=\"btn-solid theme-danger\" href=\"/usuarios/baja/{$registro['id']}\"><i class=\"bi bi-trash\"></i></a>";

                        echo "
                            <tr>
                                <td>{$modificacion} {$baja}</td>
                                <td>".$registro['id']."</td>
                                <td>".$registro['nombre']."</td>
                                <td>".$registro['apellido1']."</td>
                                <td>".$registro['apellido2']."</td>
                                <td>".formato_DDMMAAAA($registro['fecha_nacimiento'])."</td>
                                <td>".$registro['email']."</td>
                            </tr>
                        
                        
                        ";
                        
                    }

                    $url_anterior = '';
                    if ($_GET['pagina'] != "0")
                    {   $pagina_anterior = $_GET['pagina'] - 1;
                        $url_anterior = "<li class=\"page-item\"><a class=\"page-link\" href=\"/usuarios/listado/{$pagina_anterior}\">".Idioma::lit('anterior')."</a></li>";
                    }



                    $url_siguiente = '';

                    if($total_registros > (($_GET['pagina'] + 1) * TOTAL_PAGINAS_LISTADO))
                    {
                        $pagina_siguiente = $_GET['pagina'] + 1;
                        $url_siguiente = "<li class=\"page-item\"><a class=\"page-link\" href=\"/usuarios/listado/{$pagina_siguiente}\">".Idioma::lit('siguiente')."</a></li>";
                    }
                break;

            }



            

            echo "
                    </tbody>
                </table>
                <nav aria-label=\"Page navigation example\">
                <ul class=\"pagination\">
                    {$url_anterior}
                    {$url_siguiente}
                    
                </ul>
                </nav>


            ";
            
            
        break;

        default:


            echo "
            
                <div id=\"carouselStacked\" class=\"carousel slide\">
                    <div class=\"d-flex justify-content-between align-items-center\">
                        <h5 class=\"mb-0\">Top controls</h5>
                        <div>
                        <button class=\"btn-icon btn-sm\" type=\"button\" data-bs-target=\"#carouselStacked\" data-bs-slide=\"prev\">
                            <span class=\"carousel-icon-prev\" aria-hidden=\"true\"></span>
                            <span class=\"visually-hidden\">Previous</span>
                        </button>
                        <button class=\"btn-icon btn-sm\" type=\"button\" data-bs-target=\"#carouselStacked\" data-bs-slide=\"next\">
                            <span class=\"carousel-icon-next\" aria-hidden=\"true\"></span>
                            <span class=\"visually-hidden\">Next</span>
                        </button>
                        </div>
                    </div>
                    <div class=\"carousel-inner rounded-5\">
                        <div class=\"carousel-item active\">
                        <img src=\"/img/fondo1.jpeg\" class=\"d-block w-100\" alt=\"...\">
                        </div>
                        <div class=\"carousel-item\">
                        <img src=\"/img/fondo2.avif\" class=\"d-block w-100\" alt=\"...\">
                        </div>
                        <div class=\"carousel-item\">
                        <img src=\"/img/fondo3.avif\" class=\"d-block w-100\" alt=\"...\">
                        </div>
                    </div>
                </div>
            ";    


        break;
    }


    echo Template::footer();

/*
lanzarote.lan/usuarios/editar/232


lanzarote.lan?seccion=usuarios&modo=editar&id=232

*/


?>