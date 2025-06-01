<?php 
require_once __DIR__ . '/../services/banco.php';

class Auth {

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
                return true;
            }
        }
        return false;
    }
}