<?php
require_once __DIR__ . '/../models/Auth.php';
require_once __DIR__ . '/../models/Post.php';

require_once __DIR__ . '/../services/session.php';

class AuthController {
    public static function usuario() {
        $usuario = Auth::encontrarUsuario($_SESSION['id_usuario']);
        $posts = Post::encontrarPostsPorUsuario($_SESSION['id_usuario']);
        
        include __DIR__ . '/../views/auth/usuario.php';
    }
    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $senha = $_POST['password'] ?? null;

            Auth::authenticate($email, $senha);

            if (is_null($email) || is_null($senha)) {
                header('Location: /login/');
            } else {
                header('Location: /');
            }
        }

        include __DIR__ . '/../views/auth/login.php';
    }
    public static function logout() {
        logout();
        header('Location: ?url=');
    }
}