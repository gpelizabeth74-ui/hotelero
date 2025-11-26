<?php
session_start();
include '../../config.php';
include '../conexxion.php';
include '../modulo_listados.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueBird - Admin</title>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/room.css">
    <style>
        .roombox {
            background-color: #d1d7ff;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="addroomsection">
        <form action="../modulo_REGcol.php" method="POST">
            <input type="text" name="txtNombres" class="form-control" placeholder="Nombres">
            <input type="text" name="txtApellidos" class="form-control" placeholder="Apellidos">
            <input type="text" name="txtEmail" class="form-control" placeholder="Email">
            <input type="text" name="txtTelefono" class="form-control" placeholder="Telefono">
            <input type="text" name="txtNumDoc" class="form-control" placeholder="Nro. Documento">
            <select name="selTDoc" class="form-select">
                <option value="">Tipo Documento</option>
                <?php
                $pro = $_POST['selTDoc'];
                $listaproveedor = fn_listadoTDoc($conexion);
                while ($proveedor = mysqli_fetch_array($listaproveedor)) {
                ?>
                    <option value="<?php echo $proveedor[0] ?>"
                        <?php echo (($proveedor[0] == $pro) ? 'SELECTED' : ''); ?>>
                        <?php echo $proveedor[1] ?>
                    </option>

                <?php } ?>
            </select>
            <select name="selCargo" class="form-select">
                <option value="">Cargo</option>
                <?php
                $pro = $_POST['selCategoria'];
                $listaproveedor = fn_listadoCargo($conexion);
                while ($proveedor = mysqli_fetch_array($listaproveedor)) {
                ?>
                    <option value="<?php echo $proveedor[0] ?>"
                        <?php echo (($proveedor[0] == $pro) ? 'SELECTED' : ''); ?>>
                        <?php echo $proveedor[1] ?>
                    </option>

                <?php } ?>
            </select>

            <button type="submit" class="btn btn-success" name="addstaff">Add Empleado</button>
        </form>

        <?php
        if (isset($_POST['addstaff'])) {
            $staffname = $_POST['staffname'];
            $staffwork = $_POST['staffwork'];

            $sql = "INSERT INTO staff(name,work) VALUES ('$staffname', '$staffwork')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: staff.php");
            }
        }
        ?>
    </div>


    <!-- here room add because room.php and staff.php both css is similar -->
    <div class="room">
        <?php
        $sql = "select  ide_emp, nom_emp, ide_car from empleado";
        $re = mysqli_query($conexion, $sql)
        ?>
        <?php
        $lisEmp = fn_listadoEmpleados($conexion);
        while ($row = mysqli_fetch_array($lisEmp)) {
            echo "<div class='roombox'>
						<div class='text-center no-boder'>
                            <i class='fa fa-users fa-5x'></i>
							<h3>" . $row[1] . "</h3>
                            <div class='mb-1'>" . $row[2] . "</div>
                            <a href='../staffdelete.php?id=" . $row[0] . "'><button class='btn btn-danger'>Delete</button></a>
						</div>
                    </div>";
        }
        ?>
    </div>

</body>

</html>