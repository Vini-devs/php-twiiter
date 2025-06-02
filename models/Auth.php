<?php 
require_once __DIR__ . '/../services/banco.php';

class Auth {
    public static function encontrarUsuario($idUsuario) {
        $banco = Banco::getConn();
        $stmt = $banco->query("SELECT id_usuario, tipo, nickname, email, bio FROM usuario 
            WHERE id_usuario='$idUsuario'");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function criarUsuario($tipo, $nickname, $email, $senha, $bio = '') {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("INSERT INTO usuario (tipo, nickname, email, senha, bio) VALUES (:tipo, :nickname, :email, :senha, :bio)");
        return $stmt->execute([
            ':tipo' => $tipo,
            ':nickname' => $nickname,
            ':email' => $email,
            ':senha' => $senha,
            ':bio' => $bio
        ]);
    }

    public static function editarUsuario($idUsuario, $nickname, $email, $bio) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("UPDATE usuario SET nickname = :nickname, email = :email, bio = :bio WHERE id_usuario = :id_usuario");
        return $stmt->execute([
            ':nickname' => $nickname,
            ':email' => $email,
            ':bio' => $bio,
            ':id_usuario' => $idUsuario
        ]);
    }

    public static function apagarUsuario($idUsuario) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("DELETE FROM usuario WHERE id_usuario = :id_usuario");
        return $stmt->execute([':id_usuario' => $idUsuario]);
    }

    public static function authenticate($email, $senha_inserida) {
        $banco = Banco::getConn();
        $stmt = $banco->prepare("SELECT * FROM usuario WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $resp = $stmt->fetch();

        if ($resp) {
            $senha = $resp['senha'];
            if ($senha == $senha_inserida) {
                $_SESSION['id_usuario'] = $resp['id_usuario'] ?? null;
                $_SESSION['nickname'] = $resp['nickname'] ?? null;
                $_SESSION['tipo'] = $resp['tipo'] ?? null;
                return true;
            }
        }
        return false;
    }
}