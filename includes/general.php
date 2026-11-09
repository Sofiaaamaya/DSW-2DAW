<?php



define('TOTAL_PAGINAS_LISTADO', 10);

spl_autoload_register(function ($class_name) {

    $subdirectorio = '';
    if ($class_name == 'BBDD' or $class_name == 'Query')
        $subdirectorio = 'bbdd/';

    require_once "includes/{$subdirectorio}class.". strtolower($class_name) .'.php';
});