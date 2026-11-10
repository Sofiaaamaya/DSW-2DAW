<?php



define('TOTAL_PAGINAS_LISTADO', 10);

spl_autoload_register(function ($class_name) {

    $subdirectorio = '';
    if ($class_name == 'BBDD' or $class_name == 'Query')
        $subdirectorio = 'bbdd/';




    require_once "includes/{$subdirectorio}class.". strtolower($class_name) .'.php';
});


//Lee una fecha de BBDD (formato AAAAMMDD), y la devuelve en formato DD/MM/AAA donde la / es personalizable
function formato_DDMMAAAA($fecha_AAAAMMDD,$sep='/')
{

    $fecha_AAAAMMDD = str_replace('-','',$fecha_AAAAMMDD);

    return substr($fecha_AAAAMMDD,6). $sep . substr($fecha_AAAAMMDD,4,2) . $sep . substr($fecha_AAAAMMDD,0,4);
}


function  fecha_valida($fecha)
{
    $fecha = str_replace('-','',$fecha);

    $dia  = substr($fecha,6);
    $mes  = substr($fecha,4,2);
    $anho = substr($fecha,0,4);

    $fecha_valida = True;

    if ($dia < 1 || $dia > 31)
        $fecha_valida = False;
    elseif ($mes < 1 || $mes > 12)
        $fecha_valida = False;
    elseif ($anho < 1900 || $anho > (date('Y')+1))
        $fecha_valida = False;

    return $fecha_valida;



}