<?php
include("Conexion.php");
session_start();
$id = $_SESSION["id"];

$query = mysqli_query($conn,"SELECT * FROM profesores WHERE id = $id");

$datos = mysqli_fetch_assoc($query);
$extra = $datos['id_extraescolar'];

$query2 = mysqli_query($conn,"SELECT * FROM extraescolar WHERE id = $extra");

$datos2 = mysqli_fetch_assoc($query2);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel del Profesor - Extraescolares</title>
  <link rel="stylesheet" href="./Estilos/maestro.css">
</head>
<body>
  <header class="barra-superior">
    <div class="contenedor-barra">
      <a href="index.html"><img src="https://upqroo.edu.mx/wp-content/uploads/2020/11/2UPQROO-logo.png" alt="Logo UPQROO" class="logo"></a>
      <nav class="menu-navegacion">
        <a href="index.html">Inicio</a>
        <a href="inscripcion.html">Servicios</a>
        <a href="deportes.html">Extraescolares</a>
      </nav>
    </div>
  </header>

  <main class="contenido">
    <header class="encabezado">
      <h1>Panel del Profesor <?php echo $datos['nombre']?> <?php echo $datos['apellidoP']?> <?php echo $datos['apellidoM']?></h1>
      <div class="usuario">PROFESOR</div>
    </header>

    <section class="seccion-control">
      <div class="tarjeta grande fondo-imagen">
        <h2>Control de Clases y Actividades <?php echo $datos2['Nombre']?></h2>
        <p>Gestiona tus clases, horarios, y comunicados aquí.</p>
      </div>

      <div class="tarjeta mediana fondo-naranja">
        <h3>Clase siguiente: </h3>
        <form action="estado.php" method="POST">
          <label>Estado:</label>
          <select name="estado">
            <option disabled selected>Elegir opción</option>
            <option value = "Activa">Activa</option>
            <option value = "Inactiva">Inactiva</option>
          </select>
          <button class="btn" type="submit">Guardar Cambios</button>
        </form>
      </div>

        <form class="tarjeta mediana fondo-vino" action="aviso.php" method="POST">
            <div>
                <h3>Registrar Aviso</h3>
                <input  type="text" placeholder="Ej. La clase se cancela por lluvia" style="min-height: 80px;" name="aviso">
                <button class="btn" type="submit">Enviar Aviso</button>
            </div>
        </form>

      <div class="tarjeta mediana fondo-vino">
        <h3>Subir Actividad</h3>
        <form action="actividad.php" method="POST">
          <label>Fecha:</label>
          <input type="date" name = "fecha_act"><br>
          <label>Descripción:</label>
          <input type="text" placeholder="Ej. Torneo interno" name="actividad"><br>
          <button class="btn" type="submit">Subir Actividad</button>
        </form>
      </div>

      <div class="tarjeta mediana fondo-naranja">
        <h3>Control de Asistencias</h3>
        <p>Selecciona grupo o clase para ver y editar asistencias.</p>
        <select>
          <option>Taekwondo</option>
          <option>Fútbol</option>
        </select>
        <button class="btn">Ver Asistencias</button>
      </div>
        <form class="tarjeta larga fondo-naranja" action="partidos.php" method="POST">
            <div>
            <h3>Avisos de partido</h3>
            <p>Aquí se podra avisar sobre los proximos partidos.</p>
            <label>Fecha:</label>
            <input type="date" name = "fecha_part"><br>
            <label>Descripción</label>
            <input type="text" placeholder="Ej. Partido el miercoles" style="min-height: 80px;" name="partido">
            <button class="btn" type="submit">Enviar Aviso Partido</button>
        </form>
        </div>
      <div class="tarjeta grande fondo-naranja">
        <h3>Contacto con Coordinador</h3>
        <p>Para temas administrativos: <strong>deportes@upqroo.edu.mx</strong></p>
      </div>
    </section>
  </main>
</body>
</html>
