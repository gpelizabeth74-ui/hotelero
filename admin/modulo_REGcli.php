<?php
include('conexxion.php');
include('captura.php');
//$cod = getCodigo();
$nom = getNombres();
$ape = getApellidos();
$ema = getEmail();
$tel = getTelefono();
$ndo = getNumDoc();
$tdo = getTDoc();
$nac = getNacionalidad();

$sql = "INSERT INTO CLIENTE VALUES(NULL,'$ape', '$nom', '$tdo', '$ndo', '$nac', '$ema', '$tel');";
//$sql = "INSERT INTO PRODUCTO VALUES(NULL, 'TE inkakola', '1', '1', '10 CAJAS X 20 BOLSAS', '18', '39', '0','1.jpg');";
$rpta = mysqli_query($conexion, $sql);

if ($rpta) {
    echo "<script>
                alert ('Cliente Registrado correctamente..!!'); 
                history.back();
          </script>";
} else {
    echo '<script>
                alert ("Error al registrar el Cliente");
                history.back();
          </script>';
}

mysqli_close(mysql: $conexion);
