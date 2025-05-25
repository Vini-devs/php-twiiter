<?php
require_once __DIR__ . '/../services/session.php';

// controllers/AuthController.php
require_once __DIR__ . '/../functions/helpers.php';

class AuthController {
    public static function login() {
        $error_message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            // Exemplo simples de autenticação
            if (!is_null($email) && !is_null($password)) {
                $resp = fazerLogin($email, $password);

                if ($resp[0] == true) {
                    $_SESSION['logged_in'] = true;
                    redirect('?p=');
                } else {
                    echo $resp[1];
                }
            } else {
                $error_message = 'Usuário ou senha inválidos!';
            }
        }
        include __DIR__ . '/../views/login.php';
    }
    public static function logout() {
        logout();
        header('Location: ?p=');
    }
}