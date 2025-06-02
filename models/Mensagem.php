<?php 
require_once __DIR__ . '/../services/banco.php';

class Mensagem {
    public static function encontrarMensagens($idRemetente, $idDestinatario) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("SELECT * FROM mensagem_privada WHERE (id_usuario_remente = :remetente AND id_usuario_destinatario = :destinatario) OR (id_usuario_remente = :destinatario AND id_usuario_destinatario = :remetente) ORDER BY data_envio ASC");
        $stmt->execute([
            ':remetente' => $idRemetente,
            ':destinatario' => $idDestinatario
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function criarMensagem($idRemetente, $idDestinatario, $conteudo) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("INSERT INTO mensagem_privada (id_usuario_remente, id_usuario_destinatario, conteudo, data_envio) VALUES (:remetente, :destinatario, :conteudo, current_timestamp())");
        return $stmt->execute([
            ':remetente' => $idRemetente,
            ':destinatario' => $idDestinatario,
            ':conteudo' => $conteudo
        ]);
    }

    public static function editarMensagem($idMensagem, $conteudo) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("UPDATE mensagem_privada SET conteudo = :conteudo WHERE id_mensagem_privada = :idMensagem");
        return $stmt->execute([
            ':conteudo' => $conteudo,
            ':idMensagem' => $idMensagem
        ]);
    }

    public static function apagarMensagem($idMensagem) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("DELETE FROM mensagem_privada WHERE id_mensagem_privada = :idMensagem");
        return $stmt->execute([':idMensagem' => $idMensagem]);
    }
}