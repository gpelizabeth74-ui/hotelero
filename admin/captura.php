<?php
include('conexxion.php');
function getCodigo()
{
    return $_POST['txtCodigo'];
}

function getProducto()
{
    return $_POST['txtProducto'];
}

function getCargo()
{
    return $_POST['selCargo'];
}

function getNacionalidad()
{
    return $_POST['txtNacionalidad'];
}

function getCategoria()
{
    return $_POST['selCategoria'];
}

function getPrecio()
{
    return $_POST['txtPrecio'];
}

function getCantidad()
{
    return $_POST['txtCantidad'];
}

function getExistencia()
{
    return $_POST['txtExistencia'];
}

function getNombres()
{
    return $_POST['txtNombres'];
}

function getApellidos()
{
    return $_POST['txtApellidos'];
}

function getEmail()
{
    return $_POST['txtEmail'];
}

function getTelefono()
{
    return $_POST['txtTelefono'];
}

function getNumDoc()
{
    return $_POST['txtNumDoc'];
}

function getEstacion()
{
    return $_POST['selEstacion'];
}

function getTDoc()
{
    return $_POST['selTDoc'];
}

function getIdeCli()
{
    return $_POST['txtIdeCli'];
}

function getDatEn()
{
    return $_POST['dateEntrada'];
}

function getDatSa()
{
    return $_POST['dateSalida'];
}

function getNNoches()
{
    return $_POST['txtNNoches'];
}

function getNHab()
{
    return $_POST['txtNHab'];
}