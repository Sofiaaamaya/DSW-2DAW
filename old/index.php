<?php
$apiKey = '6810afb84de828403def8ff855ab3099';

$url = 'https://api.themoviedb.org/3/movie/popular'
     . '?api_key=' . $apiKey
     . '&language=es-ES';

// Realizar petición HTTP
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$respuesta = curl_exec($ch);

if ($respuesta === false) {
    die('Error de conexión: ' . curl_error($ch));
}

$codigoHttp = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($codigoHttp !== 200) {
    die('Error HTTP: ' . $codigoHttp);
}

// Convertir JSON a array PHP
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
    <title>Películas populares</title>
</head>
<body>
    <h1>Películas populares</h1>

    <?php foreach ($peliculas as $pelicula): ?>
        <article>
            <h2>
                <?= htmlspecialchars($pelicula['title']) ?>
            </h2>

            <?php if ($pelicula['poster_path']): ?>
                <img
                    src="https://image.tmdb.org/t/p/w185<?= htmlspecialchars($pelicula['poster_path']) ?>"
                    alt="Carátula"
                >
            <?php endif; ?>

            <p>
                Valoración:
                <?= round($pelicula['vote_average'], 1) ?>/10
            </p>

            <p>
                <?= htmlspecialchars($pelicula['overview']) ?>
            </p>
        </article>
        <hr>
    <?php endforeach; ?>
</body>
</html>