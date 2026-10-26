#!/usr/bin/php
<?php


    $comando = isset($argv[1])? $argv[1] : '';



    switch($comando)
    {
        case 'saludar':
            echo saludar(isset($argv[2])? $argv[2] : 'invitado');
        break;
        case 'sumar':

            $sumando1 = isset($argv[2])? $argv[2]: 0;
            $sumando2 = isset($argv[3])? $argv[3]: 0;

            echo sumar($sumando1, $sumando2);
        break;
        case 'sumar-todos':

            echo sumar_todos($argc,$argv);


        break;

        case 'es-primo':

            $numero = isset($argv[2])? $argv[2] : 0;
            echo "{$numero}". (es_primo($numero)? '' : ' NO') ." es un número primo" . PHP_EOL;

        break;

        case 'palabra-mas-larga':

            echo palabra_mas_larga($argv[2]);

        break;

        case 'estadisticas':
            echo estadisticas($argc,$argv);
        break;




        default:
            echo "
                Herramientas para hacer distintas aplicaciones:
                php toolbox.php saludar [nombre]
                php toolbox.php estadisticas n1 n2 n3 ...
                php palabra-mas-larga \"texto con varias palabras\"
                php toolbox.php sumar a b
                php toolbox.php sumar-todos 1 2 3 4 5
                php toolbox.php es-primo 29
            ";
        break;
    }


    function estadisticas($argc,$argv)
    {
        $mas_grande = 0;

        $mas_peque = '';

        $media = 0;

        for ($i= 2;$i < $argc ; $i++)
        {
            $numero_siguiente = $argv[$i];


            if ($numero_siguiente > $mas_grande)
                $mas_grande = $numero_siguiente;

            if ($numero_siguiente < $mas_peque)
                $mas_peque = $numero_siguiente;

            $media +=  $numero_siguiente;

        }

        $media = round($media / $argc - 2);

        return " min={$mas_peque}, max={$mas_grande}, media={$media}";
    }

    function palabra_mas_larga($frase)
    {

        $palabras = explode(' ',$frase);

        $palabra_mas_larga = '';

        for ($i=0 ; $i < count($palabras);$i++)
        {
            $palabra_candidata = str_replace(',','',$palabras[$i]);
            $palabra_candidata = str_replace('.','',$palabra_candidata);

            if (strlen($palabra_candidata) > strlen($palabra_mas_larga))
            {
                $palabra_mas_larga = $palabra_candidata;
            }
        }

        return  $palabra_mas_larga;
    }


    function es_primo($numero)
    {
        $es_primo = True;

        $i = 2;
        while($i < $numero)
        {
            if ($numero % $i  == 0)
            {
                $es_primo = false;
                break;
            }

            $i++;
        }


        return $es_primo;
    }



    function sumar_todos($argc,$argv)
    {
        $sumatorio = 0;

        for ($i= 2;$i < $argc ; $i++)
        {
            $sumatorio += $argv[$i];
        }

        return $sumatorio;
    }

    function sumar(int $sumando1 = 0, int $sumando2 = 0): int
    {
        return $sumando1 + $sumando2;
    }


    function saludar(string $nombre): string
    {
        return "Hola, {$nombre}";
    }
 



    /*
    #!/usr/bin/php
<?php


$mensaje = PHP_EOL."Se está realizando {$argv[1]}:". PHP_EOL;

switch($argv[1])
{
    case 'saludar':
        echo $mensaje;

        if (empty($argv[2]))
            echo "Hola, invitado";
        else
            echo "Hola, {$argv[2]}";
    break;

    case 'sumar':
        echo $mensaje;

        if (empty($argv[2]) || empty($argv[3]))
            echo "Hay que indicar, los dos sumandos". PHP_EOL;


        echo "El resultado de la suma es: ". suma($argv[2],$argv[3]);

    break;
    case 'sumar-todos':
        echo $mensaje;


        unset($argv[0]);
        unset($argv[1]);


        echo "El resultado de la suma es: ". sumarTodos($argv);

    break;
    case 'es-primo':
        echo $mensaje;

        if (empty($argv[2]))
            echo "Debes indicar al menos un valor para comprobar si es primo ". PHP_EOL;


        //
        //if (esPrimo($argv[2]))
        //    echo "El número {$argv[2]} es primo.";
        //else
        //    echo "El número {$argv[2]} NO es primo.";
        //

        echo "El número {$argv[2]} ". (esPrimo($argv[2])?'':'NO ')  ."es primo.";

        
    break;
    case 'palabra-mas-larga':
        echo $mensaje;

        if (empty($argv[2]))
            echo "Debes indicar al menos una frase ". PHP_EOL;


        $palabra_mas_larga = '';
        $longitud_palabra_mas_larga = 0;
        foreach(explode(' ',$argv[2]) as $palabra)
        {
            $longitud_candidata_a_palabra_mas_larga = strlen($palabra);

            if ($longitud_candidata_a_palabra_mas_larga > $longitud_palabra_mas_larga)    
            {
                $palabra_mas_larga = $palabra;
                $longitud_palabra_mas_larga = $longitud_candidata_a_palabra_mas_larga;
            }

        }


        echo "La palabra más larga en la frase \"{$argv[2]}\" es {$palabra_mas_larga}";


    break;
    case 'estadisticas':

        // $argc el número total de parámetros cargados
        // $argv todos los parámetros


        $min = 99999999999;
        $max = 0;
        $media = 0;

        for($i=2 ;$i < $argc;$i++)
        {
            echo "Valor a tratar {$argv[$i]}";   

            $media += $argv[$i];


            if ($argv[$i] < $min)
                $min = $argv[$i];

            if ($argv[$i] > $max)
                $max = $argv[$i];


        }



        echo PHP_EOL."La media es: ". round($media/ ($argc - 2),2);
        echo PHP_EOL."El máximo es: ". $max;
        echo PHP_EOL."El mínimo es: ". $min;





        echo $mensaje;
    break;
    default:
        echo "No se ha cargado una opción válida";
    break;
}


echo PHP_EOL.PHP_EOL;

function suma($a,$b)
{
    return $a + $b;
}

function sumarTodos($numeros) 
{

    $suma = 0;
    foreach ($numeros as $n) {
        $suma += $n;
    }
    return $suma;
}


function esPrimo($numero)
{
    if ($numero < 2)
        return false;

    for($i=2;$i<$numero;$i++)
    {
        if ($numero % $i == 0)
            return false;
        
    }

    return true;

}

*/