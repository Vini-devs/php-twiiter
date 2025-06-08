<?php

include 'functions/helpers.php';

$url = $_GET['url'] ?? null;
$url = explode("/", $url);
// print_r($url);
$pagina =  $url[0];

if (isset($url[1]) && !is_numeric($url[1])) {
    $pagina = "{$url[0]}/$url[1]";
}

require __DIR__ . '/controllers/AuthController.php';
require __DIR__ . '/controllers/PostController.php';
require __DIR__ . '/controllers/RespostaController.php';
require __DIR__ . '/controllers/MensagemController.php';
require __DIR__ . '/controllers/TopicoController.php';

if (isset($_GET['tema']) && in_array($_GET['tema'], ['claro', 'escuro'])) {
    setCookieCustom('tema', $_GET['tema'], 60 * 60 * 24 * 30); // 30 dias
    header('Location: /php-twitter' . ($_SESSION['id_usuario'] ? '/usuario/editar/' . $_SESSION['id_usuario'] : ''));
    exit;
}

if (isset($_COOKIE['tema']) && $_COOKIE['tema'] === 'claro') {
    $_SESSION['bgLayout'] = 'bg-white';
} else {
    $_SESSION['bgLayout'] = 'bg-black text-white';
}

match ($pagina) {
    'login'                     => AuthController::login(),
    'logout'                    => AuthController::logout(),
    'cadastro'                  => AuthController::cadastro(),
    'recuperar-senha'           => AuthController::recuperarSenha(),
    'dashboard'                 => AuthController::dashboard(),
    'usuario'                   => AuthController::usuario($url[1] ?? null),
    'usuario/editar'            => AuthController::editarUsuario($url[2]),
    'usuario/banir'             => AuthController::banirUsuario($url[2]),

    'post'                      => PostController::index(),
    'post/criar'                => PostController::criarPost(),
    'post/editar'               => PostController::editarPost($url[2]),
    'post/apagar'               => PostController::apagarPost($url[2]),
    'explorar'                  => PostController::explorar(),
    'pesquisar'                 => PostController::pesquisar(),
    'post/like'                 => PostController::likePost($url[2]),

    'resposta'                  => RespostaController::encontrarRespostas($url[1]),
    'resposta/criar'            => RespostaController::criarResposta($url[2]),
    'resposta/editar'           => RespostaController::editarResposta($url[2]),
    'resposta/apagar'           => RespostaController::apagarResposta($url[2]),
    'resposta/like'             => RespostaController::likeResposta($url[2]),

    'topico'                    => TopicoController::encontrarTopicos(),
    'topico/criar'              => TopicoController::criarTopico(),
    'topico/editar'             => TopicoController::editarTopico($url[2]),
    'topico/apagar'             => TopicoController::apagarTopico($url[2]),

    'mensagem'                  => MensagemController::encontrarMensagem($url[1] ?? null),
    'mensagem/editar'           => MensagemController::editarMensagem($url[2]),
    'mensagem/apagar'           => MensagemController::apagarMensagem($url[2]),

    default                     => PostController::index(),
};

exit;