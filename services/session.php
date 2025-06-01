<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id_usuario']) && $pagina != "login") {
    header('Location: login');
}

function logout () {
    session_unset();  // Remove todas as variáveis
    session_destroy(); // Destroi a sessão
}