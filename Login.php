<?php
include("Conexion.php");

$nombre = $_POST["nombre"] ?? '';
$pass   = $_POST["password"] ?? '';
$extra = $_POST["actividad"] ?? '';

$query = mysqli_query($conn, "SELECT * FROM Usuarios WHERE nombre = '$nombre' AND contraseña = '$pass'" );

if ($query && mysqli_num_rows($query) == 1) {
    $datos = mysqli_fetch_assoc($query);
    $nivel = $datos['acceso'];
    $inscrito = $datos['inscrito'];

    session_start();
    $_SESSION["id"] = $datos['id'];
    $_SESSION["extraescolar"] = $extra;

    if(!$inscrito){     //No inscrito
        switch($nivel){    
            case 1:     //Acceso de estudiante
                header("Location: InscripcionForm.php");
                break;
            case 2:
                header("Location: maestro.php");
                break;
        }
    }else{              //inscrito
        switch($nivel){
            case 1:
                header("Location: alumnos.php");     //acceso estudiante
                break;
            case 2:
                header("Location: maestro.php");
                break;
        }
    }
    exit;
}else {
    header("Location: IniciarSesion.html?error=1");  
}

$conn->close();
?>
