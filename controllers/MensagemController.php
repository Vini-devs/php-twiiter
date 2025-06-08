<?php
require_once __DIR__ . '/../services/session.php';

require_once __DIR__ . '/../models/mensagem.php';
require_once __DIR__ . '/../models/usuario.php';


if (strpos($_SERVER['REQUEST_URI'], 'mensagem') && $_SERVER['REQUEST_METHOD'] === 'POST') {
    MensagemController::criarMensagem();
}

class MensagemController {
    
    static function encontrarMensagem($idUsuario) {
        $idSessaoUsuario = $_SESSION['id_usuario'];
        
        $mensagem = [];
        $usuarios = [];
        $usuarioSelecionado = null;
        
        $usuarios = Mensagem::encontrarUsuariosQueEnviaramMensagens($idSessaoUsuario);
        
        if (is_numeric($idUsuario) && !empty($usuarios)) {
            $usuarioSelecionado = Usuario::encontrarUsuario($idUsuario);
            
            $mensagem = Mensagem::encontrarMensagens($idSessaoUsuario, $idUsuario);
        }
        
        include __DIR__ . '/../views/mensagens/mensagens.php';
    }
    
    static function criarMensagem() {
        $idSessaoUsuario = $_SESSION['id_usuario'];
        $conteudo = $_POST['conteudo'];
        $nicknameDestinatario = $_POST['nickname_destinatario'] ?? null;
        $idDestinatario = $_POST['id_destinatario'] ?? null;

        if (is_null($conteudo) || is_null($idSessaoUsuario)) {
            echo "<br> Erro ao enviar mensagem, tente novamente";
            return;
        }

        $destinatario = null;
        if (!is_null($idDestinatario)) {
            $destinatario = Usuario::encontrarUsuario($idDestinatario);
        } elseif (!is_null($nicknameDestinatario)) {
            $destinatario = Usuario::encontrarUsuarioPorNickname($nicknameDestinatario);
        } else {
            echo "<br> Erro: Nenhum destinatário especificado.";
            return;
        }
        
        Mensagem::criarMensagem($idSessaoUsuario, $destinatario['id_usuario'], $conteudo);
        
        header('Location: /php-twitter/mensagem/' . $destinatario['id_usuario']);
    }
    
    public static function editarMensagem($idMensagem) {
        $mensagem = Mensagem::encontrarMensagemPorId($idMensagem);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $conteudo = $_POST['conteudo'] ?? null;

            Mensagem::editarMensagem($idMensagem, $conteudo);

            if (is_null($conteudo)) {
                echo "<br> Erro ao editar mensagem, tente novamente";
            } else {
                header('Location: /php-twitter/mensagem/' . $mensagem['id_usuario_destinatario']);
            }
        }

        include __DIR__ . '/../views/mensagens/editar-mensagem.php';
    }
    
    public static function apagarMensagem($idMensagem) {
        Mensagem::apagarMensagem($idMensagem);

        header('Location: /php-twitter/mensagem');
    }
}

?>