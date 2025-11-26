<?php

include '../config.php';
include 'conexxion.php';

$id = $_GET['id'];

$sql1 ="SELECT EST_HAB FROM HABITACION WHERE IDE_HAB= '$id';";

#$iha = mysqli_query($conexion, $sql1);
$est = mysqli_fetch_assoc(mysqli_query($conexion, $sql1))['EST_HAB'];

#$est = $_GET['est'];



if ($est == 'Disponible') {
    $roomdeletesql = "UPDATE HABITACION SET EST_HAB='Ocupado' WHERE IDE_HAB = $id";
} else if ($est == 'Ocupado') {
    $roomdeletesql = "UPDATE HABITACION SET EST_HAB='Disponible' WHERE IDE_HAB = $id";
}else{
    $roomdeletesql = "UPDATE HABITACION SET EST_HAB='Disponible' WHERE IDE_HAB = $id";
}
;
#$roomdeletesql = "UPDATE HABITACION SET EST_HAB='A' WHERE IDE_HAB = $id";

$result = mysqli_query($conexion, $roomdeletesql);

header("Location:ventanas/room.php");

?>