<?php
include("Conexion.php");
session_start();
$id = $_SESSION["id"];

$query = mysqli_query($conn,"SELECT * FROM alumnos WHERE id = $id");

$datos = mysqli_fetch_assoc($query);

$idextra = $datos['id_extraescolar'];

$query2 = mysqli_query($conn,"SELECT * FROM extraescolar where id = $idextra");

$datos2 = mysqli_fetch_assoc($query2);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="./Estilos/usuario.css?=v1">
</head>
<body>
  <div class="contenedor">
    <header class="encabezado">
      <img src="https://upqroo.edu.mx/wp-content/uploads/2020/11/2UPQROO-logo.png" alt="Logo UPQROO" class="logo-upqroo">
      <div class="iconos">
        <div class="menu-navegacion">
        <a href="#">Inicio</a>
        <a href="#">Servicios</a>
        <a href="#">Extraescolares</a>  
        </div>
      </div>
    </header>

    <nav class="pestanas">
      <button class="pestana activa">Perfil</button>
    </nav>

    <div class="contenido-principal">
  <div class="columna-izquierda">
    <div class="tarjeta tarjeta-perfil">
      <img src="/imgs/basquetbolimg.png" alt="Foto de usuario" class="avatar">
      <h2><?php echo $datos['Nombre'] ?> <?php echo $datos['ApellidoP']?> <?php echo $datos['ApellidoM'] ?></h2>
      <p class="rol">ALUMNO</p>
      <p>Email: <?php echo $datos['Correo']?></p>
      <p>Teléfono: 9988123456</p>
      <a class="boton naranja">Editar Perfil</a>
      <a class="boton vino" href="logout.php">Cerrar Sesion</a>
    </div>
  </div>

  <div class="columna-derecha">
  <div class="columna-derecha">
  <div class="tarjeta">
    <h3>Detalles de la Cuenta</h3>
    <table class="tabla-detalles">
      <tr>
        <td class="etiqueta">Usuario:&emsp;&emsp;&emsp;</td>
        <td class="valor"><?php echo $datos['Matricula']?></td>
        <td class="etiqueta">Cuenta creada:</td>
        <td class="valor"><?php echo $datos['Fecha']?></td>
      </tr>
      <tr>
        <td class="etiqueta">Profesor:&emsp;&emsp;&#10240;</td>
        <td class="valor"><?php echo $datos2['Profesor']?></td>
        <td class="etiqueta">Extraescolar:&#10240</td>
        <td class="valor"><?php echo $datos2['Nombre']?></td>
      </tr>
    </table>
  </div>
</div>

    <div class="tarjeta">
      <h3>Notificaciones</h3>
      <div class="interaccion">
        <p><strong>Faltas:</strong> Falto a la sesion del dia 00-00-0000</p>
        <span class="fecha">2025-07-26</span>
      </div>
      <div class="interaccion">
        <p><strong>Mensaje:</strong>Se acepto su solicitud al EXTRA ESCOLAR DE TAEKWANDO </p>
        <span class="fecha">2025-07-25</span>
      </div>
    </div>
  </div>
</div>
<footer>
    Universidad Politécnica de Quintana Roo 2025 | Departamento de Cultura y Deporte
  </footer>
</body>
</html>
