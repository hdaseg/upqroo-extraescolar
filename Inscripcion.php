<?php
include("Conexion.php");
include("mail.php");

session_start();
$id = $_SESSION["id"];
$apellidoP = $_POST["ApellidoP"] ?? '';
$apellidoM = $_POST["ApellidoM"] ?? '';
$nombre = $_POST["Nombre"] ?? '';
$correo = $_POST["Correo"] ?? '';
$genero = $_POST["Genero"] ?? '';
$matricula = $_POST["Matricula"] ?? '';
$extra = $_POST["Extraescolar"] ?? '';
$carre = $_POST["Carrera"] ?? '';
$cuatri = $_POST["Cuatrimestre"] ?? '';
$turno = $_POST["Turno"] ?? '';
$fecha = $_POST["Fecha"] ?? '';
$medico = $_POST["Medico"] ?? '';

if(!empty($apellidoP) && !empty($apellidoM) && !empty($nombre) && !empty($correo) && !empty($genero) && !empty($extra) && !empty($carre) && !empty($cuatri) && !empty($turno) && !empty($fecha) && !empty($medico)){
    $apellidoP = mysqli_real_escape_string($conn, $apellidoP);
    $apellidoM = mysqli_real_escape_string($conn, $apellidoM);
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $correo = mysqli_real_escape_string($conn, $correo);
    $genero = mysqli_real_escape_string($conn, $genero);
    $matricula = mysqli_real_escape_string($conn, $matricula);
    $extra = mysqli_real_escape_string($conn, $extra);
    $carre = mysqli_real_escape_string($conn, $carre);
    $cuatri = mysqli_real_escape_string($conn, $cuatri);
    $turno = mysqli_real_escape_string($conn, $turno);
    $fecha = mysqli_real_escape_string($conn, $fecha);
    $medico = mysqli_real_escape_string($conn, $medico);


    $query = mysqli_query($conn,"UPDATE alumnos SET id_extraescolar = '$extra', ApellidoP = '$apellidoP', ApellidoM = '$apellidoM', Nombre = '$nombre', Correo = '$correo', Genero = '$genero', Matricula = '$matricula', Carrera = '$carre', Cuatrimestre = '$cuatri', Turno = '$turno', Fecha = '$fecha', Medico = '$medico' WHERE id = $id" );
    $query = mysqli_query($conn,"UPDATE usuarios SET inscrito = 1 WHERE id = $id");
}


exit;

?>