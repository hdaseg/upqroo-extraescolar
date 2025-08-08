<?php
include("Conexion.php");
session_start();

$id = $_SESSION['id'];

$actual = $_POST["actual"] ?? '';
$nueva = $_POST["nueva"] ?? '';
$confirmar = $_POST["confirmar"] ?? '';

$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = $id");
$datos = mysqli_fetch_assoc($query);

$contra = $datos["contraseña"];
$acceso = $datos["acceso"];

switch($acceso){
    case 1:
        if($contra == $actual && $nueva == $confirmar){
            mysqli_query($conn,"UPDATE usuarios SET contraseña = '$nueva' WHERE id = $id");
            header("Location: Usuario.php?status=ok");
        } else {
            header("Location: Usuario.php?status=error");
        }
        break;
    case 2:
        if($contra == $actual && $nueva == $confirmar){
            mysqli_query($conn,"UPDATE usuarios SET contraseña = '$nueva' WHERE id = $id");
            header("Location: contraMaestro.php?status=ok");
        } else {
            header("Location: contraMaestro.php?status=error");
        }
        break;
}
?>