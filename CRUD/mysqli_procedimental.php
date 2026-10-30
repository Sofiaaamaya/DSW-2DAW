<?php
$servidor = "localhost";
$usuario = "tu_usuario";
$contraseña = "tu_contraseña";
$base_datos = "tu_base_de_datos";
$conexion = mysqli_connect($servidor, $usuario, $contraseña,
$base_datos);
if (!$conexion) {
  die("Conexión fallida: " . mysqli_connect_error());
}

echo "Conexión exitosa";

//---- Ejecutar Consultas ----
$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
  while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "ID: " . $fila['id'] . " - Nombre: " . $fila['nombre'] .
    "<br>";
  }
} else {
  echo "Error en la consulta: " . mysqli_error($conexion);
}


// --- Insertar Datos ---

$nombre = "Juan";
$correo = "juan@example.com";
$sql = "INSERT INTO usuarios (nombre, correo) VALUES ('$nombre',
'$correo')";

if (mysqli_query($conexion, $sql)) {
  echo "Nuevo registro creado exitosamente";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}


mysqli_close($conexion);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
<script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
    </tbody>
  </table>
  
</body>
</html>