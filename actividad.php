<?php
include("Conexion.php");

session_start();
$id = $_SESSION["id"];

$fecha = $_POST["fecha_act"] ?? '';
$aviso = $_POST["actividad"] ?? '';

mysqli_query($conn,"UPDATE avisos SET actividad = '$aviso', fecha_act = '$fecha' WHERE id = $id");

header("location: maestro.php");
?>