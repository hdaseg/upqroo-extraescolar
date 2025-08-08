<?php
$status = $_GET['status'] ?? '';
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cambiar Contraseña</title>
  <link rel="stylesheet" href="./Estilos/maestro.css?v3">
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

  <div id="modalCambiarPass" class="modal">
    <div class="modal-contenido">
      <span class="cerrar" onclick="document.getElementById('modalCambiarPass').style.display='none'">&times;</span>
      <h2>Cambiar Contraseña</h2>
      <form class="contraseña" action="cambiarContra.php" method="POST" onsubmit="return validarContraseña()">
        <label for="actual">Contraseña actual:</label>
        <input type="password" id="actual" name="actual" required>

        <label for="nueva">Nueva contraseña:</label>
        <input type="password" id="nueva" name="nueva" required>

        <label for="confirmar">Confirmar nueva contraseña:</label>
        <input type="password" id="confirmar" name="confirmar" required>

        <div id="mensaje" class="mensaje-error">Las contraseñas no coinciden</div>

        <?php if ($status === 'error'): ?>
          <div class="error">Las contraseñas no coinciden o la actual es incorrecta</div>
        <?php elseif ($status === 'ok'): ?>
          <div class="success">Contraseña cambiada correctamente</div>
        <?php endif; ?>

        <button type="submit" class="boton naranja">Guardar cambios</button>
      </form>
    </div>
  </div>

  <script>
    function validarContraseña() {
      const nueva = document.getElementById("nueva");
      const confirmar = document.getElementById("confirmar");
      const mensaje = document.getElementById("mensaje");

      if (nueva.value !== confirmar.value) {
        confirmar.classList.add("error-input");
        mensaje.style.display = "block";
        return false;
      } else {
        confirmar.classList.remove("error-input");
        mensaje.style.display = "none";
        return true;
      }
    }
  </script>

</body>
</html>
