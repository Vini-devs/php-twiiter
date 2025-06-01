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

    public static function encontrarPostsRecentes()  {
        $banco = Banco::getConn();
        $stmt = $banco->query(
            "SELECT post.*, usuario.nickname 
            FROM post 
            INNER JOIN usuario ON post.id_usuario = usuario.id_usuario
            ORDER BY data_postagem DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function criarPost($nome, $email, $tel, $end) {
        $banco = Banco::getConn();
        $sql = "INSERT INTO fornecedores (nome_empresa, telefone_principal, email_principal, endereco) VALUES ('$nome','$tel','$email','$end')";
        return $banco->query($sql);
    }
    
    public static function apagarPost($idPost) {
        $banco = Banco::getConn();
        return $banco->query("DELETE FROM fornecedores WHERE id='$idPost'");
    }
    
}