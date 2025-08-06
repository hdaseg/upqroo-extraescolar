<?php
include("Conexion.php");
session_start();
$id = $_SESSION["id"];

$query = mysqli_query($conn, "SELECT * FROM profesores WHERE id = $id");
$datos = mysqli_fetch_assoc($query);
$extra = $datos['id_extraescolar'];

$query2 = mysqli_query($conn, "SELECT * FROM alumnos WHERE id_extraescolar = $extra");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Gestión de Asistencias</title>
  <link rel="stylesheet" href="./Estilos/asistencias.css?=v1">
</head>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const selects = document.querySelectorAll("select[name^='asistencia']");

    selects.forEach(select => {
      const updateColor = () => {
        select.classList.remove("presente", "ausente", "justificado");

        const value = select.value.toLowerCase();
        if (value === "presente") select.classList.add("presente");
        if (value === "ausente") select.classList.add("ausente");
        if (value === "justificado") select.classList.add("justificado");
      };

      // Inicializar color al cargar
      updateColor();

      // Actualizar color al cambiar
      select.addEventListener("change", updateColor);
    });
  });
</script>

<body>
  <header class="barra-superior">
    <div class="contenedor-barra">
      <a href="index.html"><img src="https://upqroo.edu.mx/wp-content/uploads/2020/11/2UPQROO-logo.png" alt="Logo UPQROO" class="logo"></a>
      <nav class="menu-navegacion">
        <a href="IniciarSesion.html">Inicio</a>
        <a href="maestro.php">Clases</a>
        <a href="asistencia.php">Asistencias</a>
      </nav>
    </div>
  </header>

  <main class="contenido">
    <header class="encabezado">
      <h1>Gestión de Asistencias</h1>
      <div class="usuario">PROFESOR</div>
    </header>

    <section class="panel-asistencias">
      <div class="tabla-asistencia">
        <form action="guardarAsistencia.php" method="POST">
          <table>
            <thead>
              <tr>
                <th>MATRÍCULA</th>
                <th>Nombre del Alumno</th>
                <th>Asistencia</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_assoc($query2)) {
                  $matricula = $row["Matricula"];
                  $nombreCompleto = $row["Nombre"] . ' ' . $row["ApellidoP"] . ' ' . $row["ApellidoM"];
                  echo "
                  <tr>
                      <td>$matricula</td>
                      <td>$nombreCompleto</td>
                      <td>
                          <select name='asistencia[$matricula]' class='select-asistencia'>
                            <option value='Presente'>Presente</option>
                            <option value='Ausente'>Ausente</option>
                            <option value='Justificado'>Justificado</option>
                          </select>
                      </td>
                  </tr>";
              }
              ?>
            </tbody>
          </table>

          <div class="acciones">
            <button class="btn" type="submit">Guardar Asistencias</button>
            <a class="btn" href="maestro.php">Cancelar</a>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
</html>
