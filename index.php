<?php

    require_once "includes/general.php";


    echo Template::header('Lanzarote');

    //switch($_GET['seccion'])
    switch("seccion")
    {
        case 'usuarios':
            //Cargamos la sección usuarios
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