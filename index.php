<?php

    require_once "includes/general.php";


    echo Template::header('Lanzarote');

    //switch($_GET['seccion'])
    switch($_GET['seccion'])
    {

            case 'usuarios':
              echo "
              <div class=\"container\">
              <section class=\"page-section\" id=\"services\">
              ";
            //Cargamos la sección usuarios

            $query = new Query("
                SELECT * 
                FROM usuarios

                
                LIMIT ". TOTAL_PAGINAS_LISTADO ."
                OFFSET ". ($_GET['pagina'] * TOTAL_PAGINAS_LISTADO )  ."
                ;
            ");

            echo "<table class=\"table\">
                <thead>
                    <tr>
                        <th scope=\"col\">#</th>
                        <th scope=\"col\">ID</th>
                        <th scope=\"col\">Nombre</th>
                        <th scope=\"col\">Apellido1</th>
                        <th scope=\"col\">Apellido2</th>
                        <th scope=\"col\">Fecha Nacimiento</th>
                        <th scope=\"col\">E-mail</th>
                    </tr>
                </thead>
                <tbody>
            ";




            while ($registro = $query->recuperar())
            {

                echo "
                    <tr>
                        <td></td>
                        <td>".$registro['id']."</td>
                        <td>".$registro['nombre']."</td>
                        <td>".$registro['apellido1']."</td>
                        <td>".$registro['apellido2']."</td>
                        <td>".$registro['fecha_nacimiento']."</td>
                        <td>".$registro['email']."</td>
                    </tr>
                
                
                ";
                
            }

            $url_anterior = '';
            if ($_GET['pagina'] != "0")
            {   $pagina_anterior = $_GET['pagina'] - 1;
                $url_anterior = "<li class=\"page-item\"><a class=\"page-link\" href=\"/usuarios/listado/{$pagina_anterior}\">Anterior</a></li>";
            }

            // $url_siguiente = '';
            // if($_GET['pagina'] !=  ){
            //   $pagina_siguiente = $_GET['pagina'] + 1;
            //   $url_siguiente = "<li class=\"page-item\"><a class=\"page-link\" href=\"/usuarios/listado/{$pagina_siguiente}\">Siguiente</a></li>";
            // }

            $pagina_siguiente = $_GET['pagina'] + 1;

            echo "
                    </tbody>
                </table>
                <nav aria-label=\"Page navigation example\">
                <ul class=\"pagination\">
                    {$url_anterior}
                    
                </ul>
                </nav>
              </div>
              </section>


            ";
            
// <li class=\"page-item\"><a class=\"page-link\" href=\"/usuarios/listado/1\">1</a></li>
// <li class=\"page-item\"><a class=\"page-link\" href=\"/usuarios/listado/2\">2</a></li>
            
        break;

        default:
          echo Template::body();
        break;
    }


    echo Template::footer();

/*
lanzarote.lan/usuarios/editar/232


lanzarote.lan?seccion=usuarios&modo=editar&id=232

*/


?>