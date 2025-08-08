<?php
include("Conexion.php");
session_start();
$id = $_SESSION["id"];
$status = $_GET['status'] ?? '';

$query = mysqli_query($conn,"SELECT * FROM alumnos WHERE id = $id");

$datos = mysqli_fetch_assoc($query);

$idextra = $datos['id_extraescolar'];

$query2 = mysqli_query($conn,"SELECT * FROM extraescolar where id = $idextra");

$datos2 = mysqli_fetch_assoc($query2);

$query3 = mysqli_query($conn, "SELECT * FROM profesores WHERE id_extraescolar = $idextra");

$datos3 = mysqli_fetch_assoc($query3);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="./Estilos/usuario.css?=v3">
<script>
document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("modalCambiarPass");
  const btn = document.getElementById("btnCambiarPass");
  const cerrar = modal.querySelector(".cerrar");

  btn.onclick = () => {
    modal.style.display = "flex";
  }

  cerrar.onclick = () => {
    modal.style.display = "none";
  }

  window.onclick = (e) => {
    if (e.target == modal) {
      modal.style.display = "none";
    }
  }
});
</script>
</head>

<body>
  <div class="contenedor">
    <header class="encabezado">
      <a href="index.html"><img src="https://upqroo.edu.mx/wp-content/uploads/2020/11/2UPQROO-logo.png" alt="Logo UPQROO" class="logo-upqroo"></a>
      <div class="iconos">
        <div class="menu-navegacion">
        <a href="index.html">Inicio</a>
        <a href="inscripcion.html">Inscribirse</a>
        <a href="deportes.html">Horarios</a>  
        </div>
      </div>
    </header>

    <nav class="pestanas">
      <button class="pestana activa">Perfil</button>
    </nav>

    <div class="contenido-principal">
  <div class="columna-izquierda">
    <div class="tarjeta tarjeta-perfil">
      <img src="https://icones.pro/wp-content/uploads/2021/02/icone-utilisateur-orange.png" alt="Foto de usuario" class="avatar">
      <h2><?php echo $datos['Nombre'] ?> <?php echo $datos['ApellidoP']?> <?php echo $datos['ApellidoM'] ?></h2>
      <p class="rol">ALUMNO</p>
      <p>Email: <?php echo $datos['Correo']?></p>
      <a class="boton naranja" id="btnCambiarPass">Cambiar contraseña</a>

      <div id="modalCambiarPass" class="modal">
        <div class="modal-contenido">
          <span class="cerrar">&times;</span>
          <h2 stlye="display: block;">Cambiar Contraseña</h2>
          <form action="cambiarContra.php" method="POST" onsubmit="return validarContraseña()">
            <label for="actual">Contraseña actual:</label>
            <input type="password" id="actual" name="actual" required>

            <label for="nueva">Nueva contraseña:</label>
            <input type="password" id="nueva" name="nueva" required>

            <label for="confirmar">Confirmar nueva contraseña:</label>
            <input type="password" id="confirmar" name="confirmar" required>

            <button type="submit" class="boton naranja">Guardar cambios</button>
            <div id="mensaje" class="mensaje-error">Las contraseñas no coinciden</div>
            <?php if ($status === 'error'): ?>
                <div class="error">Las contraseñas no coinciden o la actual es incorrecta</div>
            <?php elseif ($status === 'ok'): ?>
                <div class="success">Contraseña cambiada correctamente</div>
            <?php endif; ?>
          </form>
        </div>
      </div>
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
        <td class="valor"><?php echo $datos3['apellidoP'] . ' ' .$datos3['apellidoM'] . ' ' . $datos3['nombre'] ?></td>
        <td class="etiqueta">Extraescolar:&#10240</td>
        <td class="valor"><?php echo $datos2['Nombre']?></td>
      </tr>
    </table>
  </div>
</body>
<script>
function validarContraseña() {
  const nueva = document.getElementById("nueva");
  const confirmar = document.getElementById("confirmar");
  const mensaje = document.getElementById("mensaje");

  if (confirmar.value !== "" && nueva.value !== confirmar.value) {
    confirmar.classList.add("error");
    mensaje.style.display = "block";
    return false;
  } else {
    confirmar.classList.remove("error");
    mensaje.style.display = "none";
    return true;
  }
}

  document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'error') {
      document.getElementById("modalCambiarPass").style.display = "flex";
    }
    if (urlParams.get('status') === 'ok') {
      document.getElementById("modalCambiarPass").style.display = "flex";
    }
  });
</script>
</html>