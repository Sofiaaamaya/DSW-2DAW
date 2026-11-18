<?php



//EMail
//$email = "nombre@dominio.com";

//$email =$_POST["email"];
$mensajeErrorCampoVacio="Campo vacio, rellene el campo";
$mensajeError="Formato incorrecto";

if(empty($_POST["email"])){
    echo $mensajeErrorCampoVacio;
}elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
echo "Email valido";
} else {
echo "Email invalido";
}

//numeroTelefono
$telefono=$_POST["telefono"];
if(strlen($telefono)<=15 && strlen($telefono>=9)){
    $telefonoValido=$telefono;
}
//strlen para telfono y si okay gurdarlo y ahi usarlo solo hacer comporbacion de 0-9 numeros
if (empty($_POST["telefono"])){
    echo $mensajeErrorCampoVacio;
}elseif(!preg_match("/^[0-9]{9}/",$telefonoValido)){ //[0-9]{9-15} no //[0-9]* o ? 6 veces restantes tampoco
    echo $mensajeError;
}else{
    echo "Telefono Valido";
    $telefonoValido;
}




//Nombre Usuario
$usuario=$_POST["usuario"];
if(strlen($usuario)>=5 && strlen($usuario)<=20){
    $usuarioValido=$usuario;
}
if (empty($_POST["usuario"])){
    echo $mensajeErrorCampoVacio;
}elseif(!preg_match("/^[a-zA-ZñÑ]+[a-zA-ZñÑ_]$/",$usuarioValido)){
    echo $mensajeError;
}else{
     echo "usuario Valido";
    $usuarioValido;
}