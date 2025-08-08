<?php
include("Conexion.php");
session_start();
$hoy = date('Y-m-d');
$id = $_SESSION["id"];
$extraescolar = $_SESSION["extraescolar"];

$query = mysqli_query($conn, "SELECT * FROM alumnos WHERE id = $id");

if($query){
    $datos = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="Estilos/InscripcionForm.css?v=1">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Formulario de inscripción | UPQROO</title> 
</head>
<body>
    <div class="container">
        <header>Inscripción</header>

        <form action="Inscripcion.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Información Personal</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Apellido Paterno</label>
                            <input type="text" placeholder="Ingresa tu apellido paterno" name="ApellidoP" value="<?php echo ($datos['ApellidoP']); ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Apellido Materno</label>
                            <input type="text" placeholder="Ingresa tu apellido materno" name="ApellidoM" value="<?php echo($datos['ApellidoM']); ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Nombre/s</label>
                            <input type="text" placeholder="Ingresa tus nombre/s" name="Nombre" value="<?php echo($datos['Nombre']); ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Correo</label>
                            <input type="mail" placeholder="Ingresa tu correo institucional" name="Correo" value="<?php echo($datos['Correo']); ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Genero</label>
                            <select name="Genero" required>
                                <option value="" disabled>Selecciona tu genero</option>
                                <option value="Masculino" <?php if($datos['Genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                                <option value="Femenino" <?php if($datos['Genero'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Extraescolar</label>
                            <select name="Extraescolar" required>
                                <option value="" disabled selected>Selecciona un extraescolar</option>
                                <option value="1" <?php if($extraescolar == '1') echo 'selected'; ?>>Danza</option>
                                <option value="2" <?php if($extraescolar == '2') echo 'selected'; ?>>Fútbol</option>
                                <option value="3" <?php if($extraescolar == '3') echo 'selected'; ?>>Escolta</option>
                                <option value="4" <?php if($extraescolar == '4') echo 'selected'; ?>>Voleibol</option>
                                <option value="5" <?php if($extraescolar == '5') echo 'selected'; ?>>Basquetbol</option>
                                <option value="6" <?php if($extraescolar == '6') echo 'selected'; ?>>Taekwondo</option>
                                <option value="7" <?php if($extraescolar == '7') echo 'selected'; ?>>Atletismo</option>
                                <option value="8" <?php if($extraescolar == '8') echo 'selected'; ?>>Ajedrez</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Identificación</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Matricula</label>
                            <input type="text" placeholder="Ingresa tu matricula" name="Matricula" value="<?php echo($datos['Matricula']); ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Carrera</label>
                            <select name="Carrera">
                                <option value="" disabled selected>Seleccionar Opción</option>
                                <option value="Ingeniería en Software" <?php if($datos['Carrera'] == 'Ingeniería en Software') echo 'selected'; ?>>Ingeniería en Software</option>
                                <option value="Ingeniería en Tecnologías de la Información e Innovación Digital" <?php if($datos['Carrera'] == 'Ingeniería en Tecnologías de la Información e Innovación Digital') echo 'selected'; ?>>Ingeniería en Tecnologías de la Información e Innovación Digital</option>
                                <option value="Ingeniería Biomedica" <?php if($datos['Carrera'] == 'Ingeniería Biomedica') echo 'selected'; ?>>Ingeniería Biomedica</option>
                                <option value="Ingeniería Financiera" <?php if($datos['Carrera'] == 'Ingeniería Financiera') echo 'selected'; ?>>Ingeniería Financiera</option>
                                <option value="Terapia Física" <?php if($datos['Carrera'] == 'Terapia Física') echo 'selected'; ?>>Terapia Física</option>
                                <option value="Ingeniería en Biotecnología" <?php if($datos['Carrera'] == 'Ingeniería en Biotecnología') echo 'selected'; ?>>Ingeniería en Biotecnología</option>
                                <option value="Licenciatura en Administración" <?php if($datos['Carrera'] == 'Licenciatura en Administración') echo 'selected'; ?>>Licenciatura en Administracíon</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Cuatrimestre</label>
                            <select name="Cuatrimestre">
                                <option value="" disabled selected>Seleccionar Opción</option>
                                <option value="Tercero" <?php if($datos['Cuatrimestre'] == 'Tercero') echo 'selected'; ?>>Tercero</option>
                                <option value="Sexto" <?php if($datos['Cuatrimestre'] == 'Sexto') echo 'selected'; ?>>Sexto</option>
                                <option value="Noveno" <?php if($datos['Cuatrimestre'] == 'Noveno') echo 'selected'; ?>>Noveno</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Turno</label>
                            <select name="Turno" required>
                                <option value="" disabled selected>Selecciona una opción</option>
                                <option value="Matutino" <?php if($datos['Turno'] == 'Matutino') echo 'selected'; ?>>Matutino</option>
                                <option value="Vespertino" <?php if($datos['Turno'] == 'Vespertino') echo 'selected'; ?>>Vespertino</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Fecha de inscripción</label>
                            <input type="date" 
                                name="Fecha" 
                                value="<?php echo $hoy; ?>" 
                                min="<?php echo $hoy; ?>" 
                                max="<?php echo $hoy; ?>" 
                                required>
                        </div>


                        <div class="input-field">
                            <label>Condiciones Médicas?</label>
                            <select name="Medico">
                                <option value="" disabled selected>Seleccionar opción</option>
                                <option value="Si" <?php if($datos['Medico'] == 'Si') echo 'selected'; ?>>Si</option>
                                <option value="No" <?php if($datos['Medico'] == 'No') echo 'selected'; ?>>No</option>
                            </select>
                        </div>
                    </div>

                    <button class="nextBtn" type="submit" name="send">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>
        </div>
    </form>
    </div>
</body>
</html>