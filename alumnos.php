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

$result = mysqli_query($conn, "SELECT * FROM horarios WHERE id = $extra");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extraescolares-Upqroo</title>
    <link rel="stylesheet" href="./Estilos/alumnos.css?=v6">
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="topbar">
            <a href="index.html"><img src="https://upqroo.edu.mx/wp-content/uploads/2020/11/2UPQROO-logo.png" alt="Logo UPQROO" class="logoo"></a>
            <nav class="menu">
                <a href="IniciarSesion.html">Inicio Sesión</a>
                <a href="Inscripcion.html">Inscripción</a>
                <a href="Deportes.html">Horarios</a>
            </nav>
        </div>
    </header>


  <main class="contenido">
    <header class="encabezado">
      <h1>Bienvenido <?php echo $datos['Nombre']?> <?php echo $datos['ApellidoP']?> <?php echo $datos['ApellidoM']?></h1>
      <a class="usuario" href="Usuario.php">Perfil</a>
    </header>


      <section class="tarjetas">

        <div class="tarjeta grande fondo-imagen">
          <h2>Haz clic para búsqueda rápida</h2>
          <p>Más información sobre Pages</p>
        </div>

        <div class="tarjeta mediana fondo-naranja">
          <h3>Clase Inscrito</h3>
          <p><?php echo $datos3['Nombre'] ?></p>
        </div>

        <div class="tarjeta mediana fondo-naranja">
            <h3>Horarios</h3>
            <?php
              if ($fila = mysqli_fetch_assoc($result)) {
                  foreach ($fila as $columna => $valor) {
                      if (!in_array($columna, ['id', 'id_extraescolar']) && !empty($valor)) {
                          echo "<li>" . ucfirst($columna) . " – " . htmlspecialchars($valor) . "</li>";
                      }
                  }
              }
            ?>
        </div>

        <div class="tarjeta mediana fondo-naranja">
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
        
        <div class="tarjeta mediana fondo-vino">
          <h3>Actividad</h3>
          <ul>
            <li><?php echo $datos2['fecha_act']?> <?php echo $datos2['actividad']?></li>
          </ul>
        </div>
        <div class="tarjeta grande fondo-vino">
          <h3>¿Necesitas ayuda?</h3>
          <p>Consulta con tu profesor o escribe a: <strong><?php echo $datos4['correo']?></strong></p>
        </div>
        <div class="tarjeta larga fondo-imagen2">
        </div>
      </section>
    </main>
  </div>
</body>
</html>