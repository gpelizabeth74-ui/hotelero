<?php

include '../config.php';include 'conexxion.php';

$id = $_GET['id'];

$roomdeletesql = "DELETE FROM EMPLEADO WHERE IDE_EMP = $id";

$result = mysqli_query($conexion, $roomdeletesql);

header("Location:ventanas/staff.php");

?>