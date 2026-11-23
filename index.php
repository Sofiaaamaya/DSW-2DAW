<?php

require_once "includes/general.php";
echo Template::header('autorxd','Lanzarote','Descripción muy descriptiva');
$usuario = new Usuario();

switch($_GET['seccion']){
  case 'usuarios':
  break;
  case 'resume':
    echo Template::resume();
  break;
  case 'projects':
    echo Template::projects();
  break;
  case 'contact':
    echo Template::contact();
  break;
  default:
    echo Template::body();
  break;
}

echo Template::footer();

?>