<?php
session_start();
require_once 'services/banco.php';

include 'data/items.php';
include 'functions/helpers.php';

$posts = $_SESSION['items'] ?? $items;

$pagina = $_GET['p'] ?? null;

require_once 'controllers/HomeController.php';
require_once 'controllers/PostController.php';
require_once 'controllers/AuthController.php';
// if ($pagina = "" || !isset($pagina) || $pagina == null ) {
//     HomeController::index();
// }
if ($pagina == 'login') {
    AuthController::login();
    exit;
}
if ($pagina == 'logout') {
    AuthController::logout();
    exit;
}
if ($pagina == 'novo') {
    PostController::novo();
    exit;
}
if ($pagina == 'detalhes') {
    PostController::detalhes();
    exit;
}
if ($pagina == 'explorar') {
    PostController::explorar();
    exit;
}
if ($pagina == 'pesquisar') {
    PostController::pesquisar();
    exit;
}
if ($pagina == 'protegido') {
    PostController::protegido();
    exit;
}

HomeController::index();