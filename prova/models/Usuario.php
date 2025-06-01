<?php
require_once __DIR__ . '/../config/banco.php';

class Usuario {
    
    // Autentica usuário - Login
    public static function authenticate($username, $password) {
        $banco = Banco::getConn();
        $sql = 
        "SELECT * FROM usuarios WHERE nome_usuario='$username' LIMIT 1";
        $resp = $banco->query($sql);
        $resp_obj = $resp->fetch_object();

        $_SESSION['user_id'] = $resp_obj->id ?? null;
    }
    
}
?>