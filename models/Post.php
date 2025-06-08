<?php
require_once __DIR__ . '/../services/banco.php';

class Post {

    public static function encontrarPosts()  {
        $banco = Banco::getConn();
        $stmt = $banco->query("SELECT * FROM post");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function encontrarPostPorId($postId)  {
        $banco = Banco::getConn();
        $stmt = $banco->query("SELECT post.*, usuario.nickname 
            FROM post 
            INNER JOIN usuario ON post.id_usuario = usuario.id_usuario
            WHERE id_post='$postId' LIMIT 1");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function encontrarPostsPorUsuario($usuarioId)  {
        $banco = Banco::getConn();
        $stmt = $banco->query("SELECT post.*, usuario.nickname 
            FROM post 
            INNER JOIN usuario ON post.id_usuario = usuario.id_usuario
            WHERE post.id_usuario='$usuarioId'
            ORDER BY post.data_postagem DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function encontrarPostsRecentes()  {
        $banco = Banco::getConn();
        $stmt = $banco->query(
            "SELECT post.*, usuario.nickname 
            FROM post 
            INNER JOIN usuario ON post.id_usuario = usuario.id_usuario
            ORDER BY data_postagem DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function criarPost($idUsuario, $conteudo, $anexo) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare(
            "INSERT INTO post (id_usuario, conteudo, data_postagem, anexo, likes)
            VALUES (:id_usuario, :conteudo, current_timestamp(), :anexo, 0)"
        );
        return $stmt->execute([
            ':id_usuario' => $idUsuario,
            ':conteudo' => $conteudo,
            ':anexo' => $anexo
        ]);
    }

    public static function editarPost($idPost, $conteudo, $anexo) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("UPDATE post SET conteudo = :conteudo, anexo = :anexo WHERE id_post = :id_post");
        return $stmt->execute([
            ':conteudo' => $conteudo,
            ':anexo' => $anexo,
            ':id_post' => $idPost
        ]);
    }
    
    public static function apagarPost($idPost) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("DELETE FROM post WHERE id_post = :id_post");
        return $stmt->execute([':id_post' => $idPost]);
    }

    public static function likePost($idPost, $idUsuario) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("UPDATE post SET likes = likes + 1 WHERE id_post = :id_post");
        $stmt->execute([':id_post' => $idPost]);
    }
    
}