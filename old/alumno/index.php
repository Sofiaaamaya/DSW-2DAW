<?php
//CREACION DEL ARRAY DE LAS ACTIVIDADES
$actividades = [
    [
        "nombre" => "CrossFit",
"monitor" => "Carlos",
"plazas" => 15,
"reservas" => 12,
"precio" => 8
    ],
[
    "nombre" => "Yoga",
"monitor" => "Laura",
"plazas" => 20,
"reservas" => 20,
"precio" => 6
],
[
    "nombre" => "Pilates",
"monitor" => "Ana",
"plazas" => 12,
"reservas" => 7,
"precio" => 7
],
[
    "nombre" => "Spinning",
"monitor" => "Pedro",
"plazas" => 18,
"reservas" => 10,
"precio" => 5
],
[
    "nombre" => "Boxeo",
"monitor" => "Lucía",
"plazas" => 10,
"reservas" => 10,
"precio" => 9
],
[
    "nombre" => "Natación",
"monitor" => "Miguel",
"plazas" => 16,
"reservas" => 6,
"precio" => 7
]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>

<section>
<h2> EJERCICIO 1 - MOSTRAR ACTIVDADES</h2>
<table>
<tr>
<th>Nombre actividad</th>
<th>Nombre del monitor</th>
<th>Plazas totales</th>
<th>Plazas disponibles</th>
<th>Precio por persona</th>
</tr>

<?php
//RECORREMOS EL ARRAY DE LAS ACTIVIDADES Y MOSTRAMOS TODAS EN UNA TABLA
foreach($actividades as $actividad){
    echo"<tr>";
    echo"<td>$actividad[nombre]</td>";
    echo"<td>$actividad[monitor]</td>";
    echo"<td>$actividad[plazas]</td>";
    $plazas_disponibles = $actividad['plazas'] - $actividad['reservas'];
    echo"<td>$plazas_disponibles</td>";
    $precio = number_format($actividad['precio'],2, ",", ".") . "€";
    echo"<td>$precio</td>";
    echo"</tr>";
}
?>
</table>
</section>


<section>
<h2>EJERCICIO 2 - MODIFCAR RESERVAS</h2>
<?php
//CREAMOS UNA NUEVA ACTIVIDAD Y LA METEMOS AL ARRAY
array_push($actividades,[
    "nombre" => "Funcional",
    "monitor" => "David",
    "plazas" => 14,
    "reservas" => 4,
    "precio" => 6




]);
echo"<p>se ha añadido la actividad de funcional</p>";
echo"<p>se ha incrementado la reserva de crossfit a 14</p>";
$actividades[0]["reservas"] = 14;
echo"<p>se ha modificado el precio de pilates a 8 euros</p>";
$actividades[2]["precio"] = 8;
$eliminado = array_pop($actividades);
echo"<p>se ha eliminado de actividad de <strong>$eliminado[nombre]</strong></p>";

?>
<table>
<tr>
<th>Nombre actividad</th>
<th>Nombre del monitor</th>
<th>Plazas totales</th>
<th>Plazas disponibles</th>
<th>Precio por persona</th>
</tr>

<?php
foreach($actividades as $actividad){
    echo"<tr>";
    echo"<td>$actividad[nombre]</td>";
    echo"<td>$actividad[monitor]</td>";
    echo"<td>$actividad[plazas]</td>";
    $plazas_disponibles = $actividad['plazas'] - $actividad['reservas'];
    echo"<td>$plazas_disponibles</td>";
    $precio = number_format($actividad['precio'],2, ",", ".") . "€";
    echo"<td>$precio</td>";
    echo"</tr>";
}
?>
</table>
</section>

<section>

<h2>EJERCICIO 3 - ESTADISTICAS DEL CENTRO</h2>
<?php
$reservas_total = 0; //PARA VER EL NUMERO DE RESERVAS TOTALES
$plazas_disponibles_totales=0;
$precio_total= 0;
foreach($actividades as $actividad){
    //RECORREMOS EL ARRAY
    $reservas_total += $actividad['reservas']; //AÑADIMOS EL NUMERO DE RESERVAS A LAS RESERVAS TOTALES PARA IR CALCULANDO
    $plazas_disponibles = $actividad['plazas'] - $actividad['reservas']; //CALCULAMOS LAS PLAZAS DISPONIBLES PLAZAS - RESERVAS
    $plazas_disponibles_totales += $plazas_disponibles;

    $precio_actividad = $actividad['reservas'] * $actividad['precio'];
    $precio_total += $precio_actividad;

}

$total = count($actividades);
echo"Numero total de actividades: <strong>$total</strong><br>";
echo"Numero total de reservas: <strong>$reservas_total</strong><br>";
echo"Numero total de plazas disponibles: <strong>$plazas_disponibles_totales</strong><br>";
echo"Numero total de recaudación prevista: <strong>$precio_total</strong>";

?>
</section>



<section>
<h2>EJERCICIO 4 - ACTIVIDADES CON PLAZAS DISPONIBLES</h2>
<?php
$disponibles = [];

foreach($actividades as $actividad){
    if($actividad['reservas'] < $actividad['plazas']){
        //RECORREMOS EL ARRAY Y SI LAS RESERVAS SON MENORES QUE LAS PLAZAS LO AÑADIMOS AL ARRAY DE DISPONIBLE
        array_push($disponibles,$actividad);
    }
}
?>
<table>
<tr>
<th>Nombre actividad</th>
<th>Nombre del monitor</th>
<th>Plazas totales</th>
<th>Plazas disponibles</th>
<th>Precio por persona</th>
</tr>

<?php
foreach($actividades as $actividad){
    //RECORREMOS EL ARRAY Y LO MOSTRAMOS EN UNA TABLA
    echo"<tr>";
    echo"<td>$actividad[nombre]</td>";
    echo"<td>$actividad[monitor]</td>";
    echo"<td>$actividad[plazas]</td>";
    $plazas_disponibles = $actividad['plazas'] - $actividad['reservas'];
    echo"<td>$plazas_disponibles</td>";
    //DAMOS FORMATO AL PRECIO PARA QUE TENGA DECIMALES LA , Y SE LE AÑADA AL FINAL EL SIMBOLO DEL EURO
    $precio = number_format($actividad['precio'],2, ",", ".") . "€";
    echo"<td>$precio</td>";
    echo"</tr>";
}
?>
</table>
</section>



<section>
<h2>EJERCICIO 5 - ORDENACION DE ACTIVIDADES</h2>
<?php
//CREAMOS EL ARRAY VACIO
$precios = [];

foreach($actividades as $actividad){
    $precios += [
        //AÑADIMOS AL ARRAY PRECIOS TODAS LAS ACTIVIDADES PERO SOLO SU NOMBRE Y COMO VALOR EL PRECIO
        $actividad["nombre"] => $actividad['precio']
    ];
}
//ORDENAMOS SEGUN VALOR EN ESTE CASO DE MENOR A MAYOR
asort($precios);
echo"<p>NUMERICO:</p>";
echo"<ul>";
foreach($precios as $actividad => $precio){
    //RECORREMOS EL BUCLE Y MOSTRAMOS EN LA LISTA ES ARRAY
    echo"<li>$actividad = $precio</li>";
}
echo"</ul>";


echo"<p>ALFABÉTICO:</p>";
//ORDENAMOS SEGUN LA CLAVE EN ESTE CASO ALFABETICAMENTE
Ksort($precios);
echo"<ul>";
foreach($precios as $actividad => $precio){
    echo"<li>$actividad = $precio</li>";
}
echo"</ul>";


?>
</section>




<section>
<h2>EJERCICIO 6 - ACTIVIDADES COMPLETAS</h2>
<?php
//CREAMOS EL ARRAY COMPLETAS
$completas = [];


foreach($actividades as $actividad){
    //MIRAMOS QE SI UNA ACTIVIDAD TIENE LAS MISMAS RESERVAS QUE PLAZAS LA AÑADIMOS A EL ARRAY DE COMPLETAS
    if($actividad['reservas'] == $actividad['plazas']){
        $completas[] = $actividad['nombre'];
    }
}
echo"<ul>";
foreach($completas as $completa){
    //RECORREMOS UN ARRAY PARA MOSTRAR LAS COMPLETAS Y AS MOSTRAMOS EN UNA LISTA
    echo"<li>$completa</li>";
}
echo"</ul>";
?>
</section>


</body>
</html>
