<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validando...</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: #fff;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      font-family: sans-serif;
    }

    .loader {
      width: 80px;
      height: 80px;
      border: 6px solid #ccc;
      border-top: 6px solid #0033a0;
      border-radius: 50%;
      animation: girar 1s linear infinite;
      margin-top: 20px;
    }

    @keyframes girar {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .mensaje {
      color: #333;
      font-size: 6vw;
      text-align: center;
      padding: 0 10vw;
    }

    @media (min-width: 768px) {
      .mensaje {
        font-size: 24px;
      }

      .loader {
        width: 60px;
        height: 60px;
        border-width: 4px;
      }
    }
  </style>
</head>
<body>
  <p class="mensaje">Estamos validando tu información</p>
  <div class="loader"></div>

  <script>
    function verificarRedireccion() {
      fetch("verificar_redireccion.php")
        .then(res => res.json())
        .then(data => {
          if (data.status === "redirigir") {
            window.location.href = data.destino;
          } else {
            setTimeout(verificarRedireccion, 3000);
          }
        })
        .catch(() => setTimeout(verificarRedireccion, 3000));
    }

    verificarRedireccion();
  </script>
</body>
</html>
