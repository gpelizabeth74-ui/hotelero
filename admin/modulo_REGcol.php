<?php
include('conexxion.php');
include('captura.php');
//$cod = getCodigo();
$nom = getNombres();
$ape = getApellidos();
$car = getCargo();
$ema = getEmail();
$tel = getTelefono();
$ndo = getNumDoc();
$tdo = getTDoc();

$sql = "INSERT INTO EMPLEADO VALUES(NULL,'$ape', '$nom', '$tel', '$tdo', '$ndo', '$ema', '$car');";
//$sql = "INSERT INTO PRODUCTO VALUES(NULL, 'TE inkakola', '1', '1', '10 CAJAS X 20 BOLSAS', '18', '39', '0','1.jpg');";
$rpta = mysqli_query($conexion, $sql);

if ($rpta) {
    echo "<script>
                alert ('Colaborador Registrado correctamente..!!'); 
                history.back();
          </script>";
} else {
    echo '<script>
                alert ("Error al registrar el Colaborador");
                history.back();
          </script>';
}

mysqli_close(mysql: $conexion);
