<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Post.php';

require_once __DIR__ . '/../services/session.php';

class AuthController {
    public static function usuario() {
        $usuario = Usuario::encontrarUsuario($_SESSION['id_usuario']);
        $posts = Post::encontrarPostsPorUsuario($_SESSION['id_usuario']);
        
        include __DIR__ . '/../views/auth/usuario.php';
    }

    public static function cadastro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nickname = $_POST['nickname'] ?? null;
            $email = $_POST['email'] ?? null;
            $senha = $_POST['password'] ?? null;

            if (is_null($nickname) || is_null($email) || is_null($senha)) {
                header('Location: /php-twitter/cadastro/');
            } else {
                Usuario::criarUsuario("normal", $nickname, $email, $senha);
                header('Location: /php-twitter/login/');
            }
        }

        include __DIR__ . '/../views/auth/cadastro.php';
    }

    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $senha = $_POST['password'] ?? null;

            Usuario::authenticate($email, $senha);

            if (is_null($email) || is_null($senha)) {
                header('Location: /php-twitter/login/');
            } else {
                header('Location: /php-twitter/');
            }
        }

        include __DIR__ . '/../views/auth/login.php';
    }
    public static function logout() {
        logout();
        header('Location: /php-twitter/');
    }
}