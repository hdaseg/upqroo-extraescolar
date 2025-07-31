<?php
include("Conexion.php");

session_start();

$id = $_SESSION["id"];

$estado = $_POST["estado"];

mysqli_query($conn,"UPDATE avisos SET estado = '$estado' WHERE id = $id");


header("location: maestro.php");
?>