<?php
include("Conexion.php");

session_start();

$id = $_SESSION["id"];

$aviso = $_POST["aviso"] ?? '';

mysqli_query($conn,"UPDATE avisos SET aviso = '$aviso' WHERE id = $id");

header("location: maestro.php");

?>