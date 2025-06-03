<?php
require_once __DIR__ . '/../models/resposta.php';

class RespostaController {
    static function encontrarRespostas($idPost) {
        $post = Post::encontrarPostPorId($idPost);
        $respostas = Resposta::encontrarRespostas($idPost);

        include __DIR__ . '/../views/respostas/respostas.php';
    }

    static function criarResposta($idPost) {
        
    }
    
    static function editarResposta($idResposta) {
        $resposta = Resposta::encontrarRespostaPorId($idResposta);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $conteudo = $_POST['conteudo'] ?? null;
            $anexo = $_POST['anexo'] ?? '';

            Resposta::editarResposta($idResposta, $conteudo, $anexo);

            if (is_null($idResposta) || is_null($conteudo)) {
                echo "<br> Erro ao postar, tente novamente";
            } else {
                header("Location: /php-twitter/resposta/" . $resposta['id_post']);
            }
        }

        include __DIR__ . '/../views/respostas/editar-resposta.php';
    }

    static function apagarResposta($idResposta) {
        Resposta::apagarResposta($idResposta);

        header('Location: /php-twitter/');
    }
}
?>