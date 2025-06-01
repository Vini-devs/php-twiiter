<?php
require_once __DIR__ . '/../models/resposta.php';

class RespostaController {
    static function encontrarRespostas($idPost) {
        $post = Post::encontrarPostPorId($idPost);
        $respostas = Resposta::encontrarRespostas($idPost);

        include __DIR__ . '/../views/posts/respostas.php';
    }

    static function criarResposta($idPost) {
        
    }
    
    static function editarResposta($idResposta) {
        
    }

    static function apagarResposta($idResposta) {
        
    }
}
?>