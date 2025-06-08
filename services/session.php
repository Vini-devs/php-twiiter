<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id_usuario'])
 && $pagina != "login"
 && $pagina != "cadastro"
 && $pagina != "recuperar-senha"
 && $pagina != "pesquisar"
 && $pagina != "resposta"
 && $pagina != "") {
    header('Location: /php-twitter/login');
}

function checarTipoUsuario($tiposAutorizados) {
    $tipos = is_array($tiposAutorizados) ? $tiposAutorizados : [$tiposAutorizados];
    if (!isset($_SESSION['tipo']) || !in_array($_SESSION['tipo'], $tipos)) {
        header('Location: /php-twitter/dashboard');
        return false;
    }
    return true;
}

function checarTipoUsuarioPassivo($tiposAutorizados) {
    $tipos = is_array($tiposAutorizados) ? $tiposAutorizados : [$tiposAutorizados];
    if (!isset($_SESSION['tipo']) || !in_array($_SESSION['tipo'], $tipos)) {
        return false;
    }
    return true;
}

function logout () {
    session_unset();
    session_destroy();
}