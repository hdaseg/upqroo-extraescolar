<?php
include("Conexion.php");

    foreach ($_POST['asistencia'] as $matricula => $estado) {

        if ($estado === 'Presente') {
            $query = "UPDATE alumnos SET asistencia = asistencia + 1 WHERE Matricula = '$matricula'";
        } elseif ($estado === 'Ausente' || $estado === 'Justificado') {
            $query = "UPDATE alumnos SET falta = falta + 1 WHERE Matricula = '$matricula'";
        }

        mysqli_query($conn, $query);
    }

    echo "<script>alert('Asistencias actualizadas correctamente.'); </script>";
    header("location: asistencia.php");

?>
