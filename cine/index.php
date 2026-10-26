<?php
$apiKey = '6d983062c9dc9d778c9d9bad26900eb4';

$url = 'https://api.themoviedb.org/3/movie/popular'
     . '?api_key=' . $apiKey
     . '&language=es-ES';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$respuesta = curl_exec($ch);

if ($respuesta === false) {
    die('Error de conexión: ' . curl_error($ch));
}

$codigoHttp = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($codigoHttp !== 200) {
    die('Error HTTP: ' . codigoHttp);
}

$datos = json_decode($respuesta, true);

if (!isset($datos['results'])) {
    die('Error al obtener películas');
}

$peliculas = $datos['results'];


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Películas populares</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            height: 100%;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        }
        .card-img-top {
            height: 380px;
            object-fit: cover;
        }
        .overview-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-3 mb-md-0">
            <h1 class="fw-bold text-dark m-0">🎬 Películas Populares</h1>
        </div>
        <div class="col-md-6">
            <form class="d-flex" role="search">
                <input name="busqueda" class="form-control me-2" type="search" placeholder="Buscar película..." aria-label="Search"/>
                <button class="btn btn-outline-primary text-nowrap" type="submit">Buscar</button>
            </form>
        </div>
    </div>

    <div class="row g-4">
        <?php foreach ($peliculas as $pelicula): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card border-0 shadow-sm">
                    
                    <?php if (!empty($pelicula['poster_path'])): ?>
                        <img
                            class="card-img-top"
                            src="https://image.tmdb.org/t/p/w342<?= htmlspecialchars($pelicula['poster_path']) ?>"
                            alt="Carátula de <?= htmlspecialchars($pelicula['title']) ?>"
                        >
                    <?php else: ?>
                        <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center text-white">
                            Sin imagen
                        </div>
                    <?php endif; ?>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold text-truncate" title="<?= htmlspecialchars($pelicula['title']) ?>">
                            <?= htmlspecialchars($pelicula['title']) ?>
                        </h5>
                        
                        <div class="d-flex justify-content-between align-items-center my-2">
                            <span class="badge bg-warning text-dark">
                                ⭐ <?= round($pelicula['vote_average'], 1) ?> / 10
                            </span>
                            <small class="text-muted">
                                <?= htmlspecialchars($pelicula['release_date']) ?>
                            </small>
                        </div>
                        
                        <p class="card-text text-muted small overview-text">
                            <?= htmlspecialchars($pelicula['overview']) ?>
                        </p>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous">
</script>

</body>
</html>