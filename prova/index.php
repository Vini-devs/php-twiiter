<?php

session_start(); // Adicione esta linha no topo, se ainda não existir

$url = $_GET['url'] ?? null;
$url = explode("/", $url);
// print_r($url);
$pagina =  $url[0];

if (isset($url[1])) {
    $pagina = "{$url[0]}/$url[1]";
} 

$_SESSION['ultimo_url'] = $_GET['url'] ?? '';

require __DIR__ . '/controllers/HomeController.php';
require __DIR__ . '/controllers/FornecedorController.php';
require __DIR__ . '/controllers/ServicoController.php';

// var_dump($pagina);

match ($pagina) {
    'login'                     => HomeController::login(),
    'logout'                    => HomeController::logout(),
        
    'fornecedores'              => FornecedorController::index(),
    'fornecedores/criar'         => FornecedorController::criar(),
    'fornecedores/apagar'      => FornecedorController::apagar($url[2]),
    'fornecedores/criar'        => FornecedorController::criarFornecedor(),

    'servicos/ver'              => ServicoController::verServicos($url[2]),
    'servicos/editar'           => ServicoController::editarServico($url[2]),
    'servicos/atualizar'        => ServicoController::atualizarServico(),
    'servicos/apagar'           => ServicoController::apagarServico($url[2]),

    default                     => FornecedorController::index(),
};

exit;