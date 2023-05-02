<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/agregarDatos.css">
    <title>Document</title>
</head>
<body>
     
<?php 
require("conexion.php");
$conexion = mysqli_connect($db_hostname,$db_user,$db_password,$db_name);
if(mysqli_connect_errno()){
    echo "FALLO AL CONECTAR LA BASE DE DATOS";
    exit();
}
mysqli_select_db($conexion,$db_name) or die("NO SE ENCUENTRA LA BASE DE DATOS");
mysqli_set_charset($conexion,"utf8");

$phone = $_GET["phone"];
$name = $_GET["name"];
$lastName = $_GET["lastName"];
$city = $_GET["city"];
$dato = $_GET["dato"];

function enviarDatos($array) {

    global $conexion, $name, $lastName, $phone, $city, $listaNum, $texto_1, $texto_2, $texto_3, $texto_4, $texto_5, $texto_6, $texto_7, $texto_8, $texto_9;



    function arrayToString($arr) {
        // Usa la función implode para crear la cadena de texto
        $str = implode(' ', $arr);
      
        // Devuelve la cadena de texto
        return $str;
      }

      $listaNum = arrayToString($array);



    for ($i = 0; $i < count($array); $i++) {
        $fecha_hora_actual = date("d-m-Y H:i:s");
        $fecha_hora_pago = "- - -";
        $pagado = "No";
        $query_info = "INSERT INTO informacion_clientes (pagado, numero_boleto, nombre, apellido, celular, estado, fecha_apartado, fecha_pagado) VALUES ('$pagado','$array[$i]','$name','$lastName','$phone','$city','$fecha_hora_actual','$fecha_hora_pago')";
        $result = mysqli_query($conexion,$query_info);
    }    
    
        $texto_1 = "Hola, Aparte boletos de la rifa De *$100,000*";
        $texto_2 = "--------------------------------------------------------";
        $texto_3 = "*BOLETOS:*%0A{$listaNum}";
        $texto_4 = "*NOMBRE:* {$name}  {$lastName}";
        $texto_5 = "1 BOLETO POR $9%0A5 BOLETOS POR $45%0A10 BOLETOS POR $90%0A50 BOLETOS POR $450%0A100 BOLETOS POR $900";
        $texto_6 = "*CUENTAS DE PAGO AQUI:*";
        $texto_7 = "www.rifaselprogreso.com/php/paginaBusqueda.php%0A";
        $texto_8 = "El siguiente paso es enviar foto del comprobante de pago por aqui";
        $texto_9 = "";
    
    
    
        if ($result === false) {
            echo "<section class='labelSection'>
                    <div class='labelBox'>
                        <p class='labelBox--red'> ERROR AL ENVIAR LOS DATOS </p>
                    </div>
                  <section>";          
        }else{
            echo "<section class='labelSection'>
                    <div class='labelBox'>
                        <p class='labelBox--green'> LOS DATOS SE ENVIARON <br> CORRECTAMENTE </p>
                        <label class='labelBox--red'>¡Al presionar el boton Verde de Enviar Mensaje serás redirigido a whatsapp para confirmar la información de tu boleto!</label>
                        <label class='labelBox--black'>¡Recuerda que tu boleto sólo dura 24 horas apartado!</label>
                        <a href='https://api.whatsapp.com/send?phone=5216141921472&text=$texto_1%0A$texto_2%0A$texto_3%0A%0A$texto_4%0A%0A$texto_5%0A$texto_2%0A$texto_6%0A$texto_7%0A$texto_8' class='whatsapp'> Enviar Mensaje </a>
                    </div>
                  <section>";  
        }
}
enviarDatos($dato);
/* SALTO LINEA %0A  ESPACIO %20  */
?>
</body>
</html>