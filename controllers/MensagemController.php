<?php
require_once __DIR__ . '/../models/mensagem.php';

class MensagemController {

    static function encontrarMensagem($idUsuario) {
        $idSessaoUsuario = $_SESSION['id_usuario'];
        
        $mensagem = [];
        $usuarios = [];

        $usuarios = Mensagem::encontrarUsuariosQueEnviaramMensagens($idSessaoUsuario);
        
        if (isset($idUsuario) && !empty($usuarios)) {
            $mensagem = Mensagem::encontrarMensagens($idSessaoUsuario, $idUsuario);
        }

        include __DIR__ . '/../views/mensagens/mensagens.php';
    }
}

?>