<?php
require_once __DIR__ . '/../models/Servico.php';
require_once __DIR__ . '/../models/Fornecedor.php';

class ServicoController {

    public static function verServicos($idFornecedor) {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: login');
        }

        require __DIR__ . '/../views/servicos.php';
    }
    

    public static function editarServico($idServico) {
        
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: login');
        }

        require __DIR__ . '/../views/servicos-editar.php';
    }


    public static function atualizarServico() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: login');
        }

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idServico = $_POST['id'] ?? null;
            $idFornecedor = $_POST['fornecedor_id'] ?? null;
            $titulo = $_POST['titulo'] ?? null;
            $preco = $_POST['preco'] ?? null;

            Servico::editar($idServico, $idFornecedor, $titulo, $preco);

            if (is_null($idFornecedor) || is_null($idServico)) {
                echo "<br> .. algum erro... fazer login";
            } else {
                // var_dump($_SESSION['user_id']);
                header('Location: /php-prova/');
            }
        }

        header('Location: ../servicos');
    }


    public static function apagarServico($idServico) {
        
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: login');
        }

        $url = $_GET['url'] ?? null;
        $url = explode("/", $url);

        Servico::apagar($url[2]);

        header('Location: ../../servicos');
    }
}
