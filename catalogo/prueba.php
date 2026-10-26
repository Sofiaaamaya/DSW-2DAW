<?php 
$reservas = [
    [
        "nombre" => "Carlos Pérez",
        "deporte" => "Tenis",
        "pista" => "Pista 1",
        "fecha" => "2026-10-28",
        "precio" => 12.50,
        "estado" => "pendiente"
    ],
    [
        "nombre" => "Ana López",
        "deporte" => "Padel",
        "pista" => "Pista 3",
        "fecha" => "2026-10-29",
        "precio" => 8.00,
        "estado" => "confirmada"
    ],
    [
        "nombre" => "Miguel Muñoz",
        "deporte" => "baloncesto",
        "pista" => "Pista 5",
        "fecha" => "2026-12-28",
        "precio" => 6.70,
        "estado" => "pendiente"
    ],
    [
        "nombre" => "Carmen Cruz",
        "deporte" => "badmintón",
        "pista" => "Pista 5",
        "fecha" => "2026-10-29",
        "precio" => 10.00,
        "estado" => "pendiente"
    ],
    [
        "nombre" => "Kay Trujiño",
        "deporte" => "Fútbol",
        "pista" => "Pista 1",
        "fecha" => "2026-12-24",
        "precio" => 15.50,
        "estado" => "pendiente"
    ],
    [
        "nombre" => "Hannah Pereira",
        "deporte" => "Padel",
        "pista" => "Pista 3",
        "fecha" => "2026-10-29",
        "precio" => 8.00,
        "estado" => "confirmada"
    ]
];

$nuevaReserva = [
    "nombre" => "Soralla rodriguez",
    "deporte" => "Piscina",
    "pista" => "Pista 6",
    "fecha" => "2026-10-30",
    "precio" => 18.00,
    "estado" => "confirmada"
];

//------ Ejercicio 2 -----------

array_push($reservas,$nuevaReserva);

$reservas[0]['estado'] = 'confirmada';

array_pop($reservas);

//------ Ejercicio 3 y 4-----------
$totalReservas = count($reservas);
$sumaIngresos = 0;
$reservaMasBarata = "";
$reservaMasCara = "";
$y = 0;
$x = 9999999999;


$economicas = [];

$precios = [];
$pistas = [];

foreach ($reservas as $reserva){
  if (!in_array($reserva["pista"], $pistas)) {
      $pistas[] = $reserva["pista"];
  }
  $precios[$reserva['nombre']] = $reserva['precio'];
  //var_dump($precios);

  if($reserva['precio'] < 10){
    array_push($economicas,$reserva);
  }
  $sumaIngresos += $reserva['precio'];
  if($reserva['precio'] > $y){
    $reservaMasCara = $reserva['nombre'];
    $y = $reserva['precio'];
  }
  if($reserva['precio'] < $x){
    $reservaMasBarata = $reserva['nombre'];
    $x = $reserva['precio'];
  }
};

// ---- ejer 7 -----

$ordenPrecio = $precios;
asort($ordenPrecio);

$ordenNombre = $precios;
ksort($ordenNombre);
// print_r($pistas)





// --- FORMULARIO ---

$errores = [];
$nuevaReservaForm = [];
$paso = $_POST["paso"] ?? 0;

$nombre = $_POST['nombre'] ?? "";
$deporte = $_POST['deporte'] ?? "";
$pista = $_POST['pista'] ?? "";
$fecha = $_POST['fecha'] ?? "";
$precio = $_POST['precio'] ?? "";

// Solo validar si el usuario ha enviado el formulario
if ($paso == 1) {

    if ($nombre === "") {
        $errores['nombre'] = "El nombre no puede estar vacío";
    }

    if ($deporte === "") {
        $errores['deporte'] = "El deporte no puede estar vacío";
    }

    if ($pista === "" || !is_numeric($pista) || $pista < 1 || $pista > 10) {
        $errores['pista'] = "La pista debe ser un número entre 1 y 10";
    }

    if ($fecha === "") {
        $errores['fecha'] = "La fecha es obligatoria";
    }

    if ($precio === "" || !is_numeric($precio) || $precio <= 0) {
        $errores['precio'] = "El precio debe ser un número mayor que 0";
    }

    // Si NO hay errores → añadir reserva
    if (empty($errores)) {
        $nuevaReservaForm = [
            "nombre" => $nombre,
            "deporte" => $deporte,
            "pista" => "Pista " . $pista,
            "fecha" => $fecha,
            "precio" => floatval($precio),
            "estado" => "pendiente"
        ];

        array_push($reservas, $nuevaReservaForm);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de reservas deportivas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
<script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Deporte</th>
          <th scope="col">Pista</th>
          <th scope="col">Fecha</th>
          <th scope="col">Precio</th>
          <th scope="col">Estado</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach($reservas as $reserva): ?>
            <tr>
              <td><?= htmlspecialchars($reserva['nombre']) ?></td>
              <td><?= htmlspecialchars($reserva['deporte']) ?></td>
              <td><?= htmlspecialchars($reserva['pista']) ?></td>
              <td><?= htmlspecialchars($reserva['fecha']) ?></td>
              <td><?= ($reserva['precio']) ?> €</td>
              <td><?= htmlspecialchars($reserva['estado']) ?> </td>
            </tr>
          <?php endforeach ?>
      </tbody>
    </table>
    <hr>
    <ul class="list-group mt-5">
      <li class="list-group-item">Número total de reservas: <?= $totalReservas ?></li>
      <li class="list-group-item">Suma total de ingresos: <?= round($sumaIngresos,2) ?></li>
      <li class="list-group-item">Precio medio: <?=  round($sumaIngresos / $totalReservas,2) ?></li>
      <li class="list-group-item">Reserva más barata: <?= $reservaMasBarata ?></li>
      <li class="list-group-item">Reserva más cara: <?= $reservaMasCara ?></li>
    </ul>

    <hr>
    <table class="table mt-5">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Deporte</th>
          <th scope="col">Pista</th>
          <th scope="col">Fecha</th>
          <th scope="col">Precio</th>
          <th scope="col">Estado</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach($economicas as $economica): ?>
            <tr>
              <td><?= htmlspecialchars($economica['nombre']) ?></td>
              <td><?= htmlspecialchars($economica['deporte']) ?></td>
              <td><?= htmlspecialchars($economica['pista']) ?></td>
              <td><?= htmlspecialchars($economica['fecha']) ?></td>
              <td><?= ($economica['precio']) ?> €</td>
              <td><?= htmlspecialchars($economica['estado']) ?> </td>
            </tr>
          <?php endforeach ?>
      </tbody>
    </table>
    <hr>
    <ul class="my-5">
      <?php foreach($ordenPrecio  as $clave => $valor): ?>
        <li><?=  $clave; ?>: <?= $valor; ?></li>
        <?php endforeach; ?>
    </ul>
    <hr>
    <ul class="my-5">
      <?php foreach($ordenNombre  as $clave => $valor): ?>
        <li><?=  $clave; ?>: <?= $valor; ?></li>
        <?php endforeach; ?>
    </ul>
  </div>

<div class="container mt-5">
    <h2 class="mb-4">Añadir nueva reserva</h2>

    <form method="post" class="border p-4 rounded shadow-sm bg-light">
        <input type="hidden" name="paso" value="1">

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
            <?php if(isset($errores["nombre"])): ?>
                <small class="text-danger"><?= $errores["nombre"] ?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Deporte:</label>
            <input type="text" class="form-control" name="deporte" value="<?= htmlspecialchars($deporte) ?>">
            <?php if(isset($errores["deporte"])): ?>
                <small class="text-danger"><?= $errores["deporte"] ?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Pista (1-10):</label>
            <input type="number" class="form-control" name="pista" min="1" max="10" value="<?= htmlspecialchars($pista) ?>">
            <?php if(isset($errores["pista"])): ?>
                <small class="text-danger"><?= $errores["pista"] ?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha:</label>
            <input type="date" class="form-control" name="fecha" value="<?= htmlspecialchars($fecha) ?>">
            <?php if(isset($errores["fecha"])): ?>
                <small class="text-danger"><?= $errores["fecha"] ?></small>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio (€):</label>
            <input type="number" step="0.01" class="form-control" name="precio" value="<?= htmlspecialchars($precio) ?>">
            <?php if(isset($errores["precio"])): ?>
                <small class="text-danger"><?= $errores["precio"] ?></small>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Guardar reserva</button>
    </form>
</div>

</body>
</html>