<?php
require_once __DIR__ . '/../services/banco.php';

class Resposta {
    static function encontrarRespostas($postId) {
        $banco = Banco::getConn();
        $stmt = $banco->query("SELECT post_resposta.*, usuario.nickname 
            FROM post_resposta 
            INNER JOIN usuario ON post_resposta.id_usuario = usuario.id_usuario
            WHERE id_post='$postId'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}