<?php 
require_once __DIR__ . '/../services/banco.php';

class Topico {
    public static function encontrarPostsPorTopico($idTopico) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare(
            "SELECT post.*, usuario.nickname FROM post
            INNER JOIN post_topico ON post.id_post = post_topico.id_post
            INNER JOIN usuario ON post.id_usuario = usuario.id_usuario
            WHERE post_topico.id_topico = :id_topico
            ORDER BY post.data_postagem DESC"
        );
        $stmt->execute([':id_topico' => $idTopico]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function encontrarTopicos() {
        $banco = Banco::getConn();
        $stmt = $banco->query("SELECT * FROM topico");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function encontrarTopicosDeUmUsuario($idUsuario) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("SELECT DISTINCT t.* FROM topico t
            INNER JOIN post_topico pt ON t.id_topico = pt.id_topico
            INNER JOIN post p ON pt.id_post = p.id_post
            WHERE p.id_usuario = :id_usuario");
        $stmt->execute([':id_usuario' => $idUsuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function encontrarTopicoPorId($id_topico) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("SELECT * FROM topico WHERE id_topico = :id_topico LIMIT 1");
        $stmt->execute([':id_topico' => $id_topico]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function criarTopico($nome) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("INSERT INTO topico (nome) VALUES (:nome)");
        return $stmt->execute([':nome' => $nome]);
    }   

    public static function editarTopico($id_topico, $nome) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("UPDATE topico SET nome = :nome WHERE id_topico = :id_topico");
        return $stmt->execute([
            ':nome' => $nome,
            ':id_topico' => $id_topico
        ]);
    }

    public static function apagarTopico($id_topico) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("DELETE FROM topico WHERE id_topico = :id_topico");
        return $stmt->execute([':id_topico' => $id_topico]);
    }
}
