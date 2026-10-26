<?php
$videojuegos = [
    [
        "titulo" => "Minecraft",
        "plataforma" => "PC",
        "genero" => "Sandbox",
        "precio" => 25.99,
        "stock" => 10
    ],
    [
        "titulo" => "Elden Ring",
        "plataforma" => "PS5",
        "genero" => "RPG",
        "precio" => 59.99,
        "stock" => 5
    ],
    [
        "titulo" => "The Legend of Zelda: Tears of the Kingdom",
        "plataforma" => "Nintendo Switch",
        "genero" => "Aventura",
        "precio" => 69.99,
        "stock" => 8
    ],
    [
        "titulo" => "Grand Theft Auto V",
        "plataforma" => "Xbox Series X",
        "genero" => "Acción",
        "precio" => 29.99,
        "stock" => 15
    ],
    [
        "titulo" => "Cyberpunk 2077",
        "plataforma" => "PC",
        "genero" => "RPG",
        "precio" => 49.99,
        "stock" => 7
    ],
    [
        "titulo" => "God of War Ragnarök",
        "plataforma" => "PS5",
        "genero" => "Acción-Aventura",
        "precio" => 69.99,
        "stock" => 4
    ]
];

$sumaStock = 0;
$mediaPrecios = 0;
$masCaro = "";
$masBarato = "";
$x = 0;
$y = 10000;

//---- Filtrado de videojuegos ----

$economicos = [];

foreach ($videojuegos as $videojuego){
  $sumaStock += $videojuego['stock'];
  $mediaPrecios += $videojuego['precio'];
  if($videojuego['precio'] <= 30){
    $economicos[] = $videojuego;
  }
  
  if($videojuego['precio'] < $y){
    $masBarato = $videojuego['titulo'];
    $y = $videojuego['precio'];
  }

  if($videojuego['precio'] > $x){
    $masCaro = $videojuego['titulo'];
    $x = $videojuego['precio'];
  }

}

// var_dump($economicos);

// ------- Estadísticas ------

$nuevoJuego = [
    "titulo" => "Hades II",
    "plataforma" => "PC",
    "genero" => "Roguelike",
    "precio" => 29.99,
    "stock" => 20
];

array_pop($videojuegos);
array_push($videojuegos, $nuevoJuego);

// ------- Estadísticas ------

$totalVideojuegos = count($videojuegos);


// ------- Ordenación ------



// ------- Arrays indexados ------




?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo Videojuegos</title>
  <link rel="stylesheet" href="styles.css">
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >

</head>
  <body>
  <div class="container py-5">

    <div class="row align-items-center mb-5">
      <div class="col-md-6 mb-3 mb-md-0">
          <h1 class="fw-bold text-dark m-0">Catálogo de Videojuegos</h1>
      </div>
      <div class="col-md-6">
          <form class="d-flex" role="search">
              <input name="busqueda" class="form-control me-2" type="search" placeholder="Buscar película..." aria-label="Search"/>
              <button class="btn btn-outline-primary text-nowrap" type="submit">Buscar</button>
          </form>
      </div>
    </div>

    <div class="row g-4">
        <?php foreach ($videojuegos as $videojuego): ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold text-truncate" title="<?= htmlspecialchars($videojuego['titulo']) ?>" >
                    <?= htmlspecialchars($videojuego['titulo']) ?>
                </h5>
                <small class="text-muted">
                  Género: <?= htmlspecialchars($videojuego['genero']) ?>
                </small>
                <small class="text-muted">
                  Plataforma: <?= htmlspecialchars($videojuego['plataforma']) ?>
                </small>
                <small class="text-muted">
                  Stock: <?= htmlspecialchars($videojuego['stock']) ?>
                </small>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="text-success">
                    Precio: <?= round($videojuego['precio'],2) ?> €
                  </span>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
    </div>
  </div>
  <div class="container">
    <h2 class="text-primary">Estadísticas</h2>
    <ul class="list-group">
      <li class="list-group-item">El número total de videojuegos: <?php echo $totalVideojuegos ?></li>
      <li class="list-group-item">La suma de todas las unidades disponibles en stock: <?php echo $sumaStock ?></li>
      <li class="list-group-item">El precio medio de los juegos: <?php echo round($mediaPrecios / count($videojuegos),2) ?></li>
      <li class="list-group-item">El más barato: <?php echo $masBarato ?></li>
      <li class="list-group-item">El más caro: <?php echo $masCaro ?></li>
    </ul>

  </div>
  <div class="container">
    <h2 class="text-success mt-5">Económicos</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">titulo</th>
          <th scope="col">plataforma</th>
          <th scope="col">genero</th>
          <th scope="col">precio</th>
          <th scope="col">stock</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($economicos as $economico): ?>
        <tr>
          <td><?= htmlspecialchars($economico['titulo']) ?></td>
          <td><?= htmlspecialchars($economico['plataforma']) ?></td>
          <td><?= htmlspecialchars($economico['genero']) ?></td>
          <td><?= htmlspecialchars($economico['precio']) ?> €</td>
          <td><?= htmlspecialchars($economico['stock']) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>

    </table>
  </div>
</body>
<script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
  crossorigin="anonymous">
</script>
</html>