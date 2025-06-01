<?php
require_once __DIR__ . '/../models/Fornecedor.php';

class FornecedorController {


    public static function index() {

        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?url=login');
        }

        require __DIR__ . '/../views/fornecedores.php';
    }

    
    public static function criar() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: ?url=login');
        }


        require __DIR__ . '/../views/fornecedores-criar.php';
    }


    public static function criarFornecedor() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?url=login');
        }

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome_empresa'] ?? null;
            $email = $_POST['telefone_principal'] ?? null;
            $tel = $_POST['email_principal'] ?? null;
            $end = $_POST['endereco'] ?? null;

            Fornecedor::criarFornecedor($nome, $email, $tel, $end);

            if (is_null($email) || is_null($end)) {
                echo "<br> .. algum erro... fazer login";
            } else {
                // var_dump($_SESSION['user_id']);
                header('Location: /php-prova/');
            }
        }

        header("Location: ../fornecedores");
    }

    
    public static function apagar($idFornecedor) {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: ?url=login');
        }

        $url = $_GET['url'] ?? null;
        $url = explode("/", $url);

        Fornecedor::apagar($url[2]);


        header('Location: ../../fornecedores');
    }

}
