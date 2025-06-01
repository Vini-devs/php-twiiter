<?php

require_once __DIR__ . '/../models/Usuario.php';

class HomeController {

    public static function login() {

        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_formulario = $_POST['username'] ?? null;
            $senha_formulario = $_POST['password'] ?? null;

            Usuario::authenticate($usuario_formulario, $senha_formulario);

            if (is_null($usuario_formulario) || is_null($senha_formulario)) {
                echo "<br> .. algum erro... fazer login";
            } else {
                // var_dump($_SESSION['user_id']);
                header('Location: /php-prova/');
            }
        }
        // 

        require __DIR__ . '/../views/login.php';
    }

    public static function logout() {
        session_unset();
        session_destroy();
        session_abort();
        

        header('Location: login');
    }
    
}
?>