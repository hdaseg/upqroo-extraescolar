<?php
include("Conexion.php");
session_start();

$id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM alumnos WHERE id = $id");
$datos = mysqli_fetch_assoc($query);

$extra = $datos["id_extraescolar"];

$query2 = mysqli_query($conn, "SELECT * FROM avisos WHERE id_extraescolar = $extra");
$datos2 = mysqli_fetch_assoc($query2);

$query3 = mysqli_query($conn, "SELECT * FROM extraescolar WHERE id = $extra");
$datos3 = mysqli_fetch_assoc($query3);

$query4 =  mysqli_query($conn,"SELECT * FROM profesores WHERE id_extraescolar = $extra");
$datos4 = mysqli_fetch_assoc($query4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extraescolares-Upqroo</title>
    <link rel="stylesheet" href="./Estilos/alumnos.css?=v1">
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
</head>
<body>
  <header class="barra-superior">
    <div class="contenedor-barra">
      <a href="index.html"><img src="https://upqroo.edu.mx/wp-content/uploads/2020/11/2UPQROO-logo.png" alt="Logo UPQROO" class="logo"></a>
      <nav class="menu-navegacion">
        <a href="IniciarSesion.html">Inicio</a>
        <a href="Inscripcion.html">Servicios</a>
        <a href="Deportes.html">Extraescolares</a>
      </nav>
    </div>
  </header>


  <main class="contenido">
    <header class="encabezado">
      <a class="usuario" href="Usuario.php">Perfil</a>
    </header>


      <section class="tarjetas">

        <div class="tarjeta grande fondo-imagen">
          <h2>Haz clic para búsqueda rápida</h2>
          <p>Más información sobre Pages</p>
        </div>

        <div class="tarjeta mediana fondo-naranja">
          <div class="etiqueta">NOTICIA</div>
          <br>
          <p>Holaaa</p>
            <br>
        </div>

        <div class="tarjeta mediana fondo-naranja">
          <h3>Clase Inscrito</h3>
          <p><?php echo $datos3['Nombre'] ?></p>
        </div>

        <div class="tarjeta mediana fondo-vino">
            <h3>Horario</h3>
            <li>Lunes – 10:30 a 11:30 AM</li>
            <li>Martes – 2:15 a 3:15 PM</li>
            <li>Miércoles – 10:30 a 11:30 AM</li>
            <li>Jueves – 2:15 a 3:15 PM</li>
        </div>

        <div class="tarjeta mediana fondo-vino">
            <h3>Estado De La Clase</h3>
            <p><?php echo $datos2['estado'] ?></p>
            <br>
            <br>
        </div>

        <div class="tarjeta mediana fondo-vino">
            <h3>Partidos</h3>
            <p><?php echo $datos2['fecha']?> <?php echo $datos2['partido'] ?></p>
            <br>
            <br>
        </div>

        <div class="tarjeta mediana fondo-vino">
            <div class="etiqueta">NOTICIA</div>
            <br>
            <h3>Avisos del profesor</h3>
            <p><?php echo $datos2['aviso']?></p>
            <br>
            <br>
        </div>
        <div class="tarjeta mediana fondo-naranja">
          <h3>Asistencia</h3>
          <p>75% de clases asistidas</p>
          <div class="barra-progreso">
            <div class="progreso" style="width: 75%;"></div>
          </div>
        </div>
        <div class="tarjeta mediana fondo-naranja">
          <h3>Actividad</h3>
          <ul>
            <li><?php echo $datos2['fecha_act']?> <?php echo $datos2['actividad']?></li>
          </ul>
        </div>
        <div class="tarjeta grande fondo-naranja">
          <h3>¿Necesitas ayuda?</h3>
          <p>Consulta con tu profesor o escribe a: <strong><?php echo $datos4['correo']?></strong></p>
        </div>
      </section>
    </main>
  </div>
  <footer>
    Universidad Politécnica de Quintana Roo 2025 | Departamento de Cultura y Deporte
  </footer>
</body>
</html>