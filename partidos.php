<?php
include("Conexion.php");

session_start();

$id = $_SESSION["id"];

$aviso = $_POST["partido"] ?? '';
$fecha = $_POST["fecha_part"] ?? '';

mysqli_query($conn,"UPDATE avisos SET partido = '$aviso',fecha = '$fecha' WHERE id = $id");

header("location: maestro.php");

?>