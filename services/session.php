<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function logout () {
    session_unset();  // Remove todas as variáveis
    session_destroy(); // Destroi a sessão
}