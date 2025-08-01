<?php
include("Conexion.php");

session_start();

$id = $_SESSION["id"];

$dia = $_POST["dia"] ?? '';
$hora = $_POST["hora"] ?? '';

$query = mysqli_query($conn, "SELECT * FROM profesores WHERE id = $id");
$datos = mysqli_fetch_assoc($query);

$extra = $datos['id_extraescolar'];

$query2 = mysqli_query($conn,"UPDATE horarios SET $dia = '$hora' WHERE id = $extra");


header("location: maestro.php");
?>