<?php
include('conexxion.php');
include('captura.php');
//$cod = getCodigo();
$den = getDatEn();
$dsa = getDatSa();
$icl = getIdeCli();
$nno = getNNoches();
$nha = getNHab();

$sql1 ="SELECT IDE_HAB FROM HABITACION WHERE NUM_HAB= '$nha';";

#$iha = mysqli_query($conexion, $sql1);
$iha = mysqli_fetch_assoc(mysqli_query($conexion, $sql1))['IDE_HAB'];

$sql2 = "SELECT PRE_HAB FROM HABITACION WHERE IDE_HAB = '$iha'";
#$rpta1 = strval(mysqli_query($conexion, $sql2));    
$rpta1 = mysqli_fetch_assoc(mysqli_query($conexion, $sql2))['PRE_HAB'];

$rpta1 = floatval(str_replace(',', '.', trim($rpta1)));
$nno = floatval($nno);
$iha = floatval($iha);

$mto = $rpta1 * $nno;

$sql = "INSERT INTO RESERVA VALUES(NULL,'$icl', '$den', '$dsa', '$nno', '$mto', '$iha');";
$rpta = mysqli_query($conexion, $sql);
//$sql = "INSERT INTO PRODUCTO VALUES(NULL, 'TE inkakola', '1', '1', '10 CAJAS X 20 BOLSAS', '18', '39', '0','1.jpg');";

if ($rpta) {
    echo "<script>
                alert ('Reserva Registrado correctamente..!!'); 
                history.back();
          </script>";
} else {
    echo '<script>
                alert ("Error al registrar el Reserva");
                history.back();
          </script>';
}

mysqli_close(mysql: $conexion);
