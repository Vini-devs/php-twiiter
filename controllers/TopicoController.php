<?php
require_once __DIR__ . '/../models/topico.php';

class TopicoController {
    static function encontrarTopicos() {
        $topicos = Topico::encontrarTopicos();
        include __DIR__ . '/../views/posts/explorar.php';
    }

    static function criarTopico() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? null;

            if (!$nome) {
                echo "<br>Erro: informe um nome para o tópico.";
            } else {
                $sucesso = Topico::criarTopico($nome);
                if ($sucesso) {
                    header("Location: /php-twitter/topico");
                    exit;
                } else {
                    echo "<br>Erro ao criar tópico. Tente novamente.";
                }
            }
        }

        include __DIR__ . '/../views/topicos/criar-topico.php';
    }

    static function editarTopico($idTopico) {
        $topico = Topico::encontrarTopicoPorId($idTopico);

        if (!$topico) {
            echo "<br>Tópico não encontrado.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? null;

            if (!$nome) {
                echo "<br>Erro: informe um novo nome.";
            } else {
                $sucesso = Topico::editarTopico($idTopico, $nome);
                if ($sucesso) {
                    header("Location: /php-twitter/topico");
                    exit;
                } else {
                    echo "<br>Erro ao editar tópico. Tente novamente.";
                }
            }
        }

        include __DIR__ . '/../views/topicos/editar-topico.php';
    }

    static function apagarTopico($idTopico) {
        $sucesso = Topico::apagarTopico($idTopico);

        if ($sucesso) {
            header("Location: /php-twitter/topico");
            exit;
        } else {
            echo "<br>Erro ao apagar tópico. Tente novamente.";
        }
    }
}