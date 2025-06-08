<?php
require_once __DIR__ . '/../services/session.php';

require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Topico.php';

class AuthController {
    public static function usuario($idUsuario = null) {
        $usuario = Usuario::encontrarUsuario($idUsuario ?? $_SESSION['id_usuario']);
        $posts = Post::encontrarPostsPorUsuario($idUsuario ?? $_SESSION['id_usuario']);

        include __DIR__ . '/../views/usuarios/usuario.php';
    }

    public static function editarUsuario($idUsuario) {
        if ($idUsuario != $_SESSION['id_usuario'] && !checarTipoUsuarioPassivo('admin')) {
            header('Location: /php-twitter/usuario');
            exit;
        }

        $usuario = Usuario::encontrarUsuario($idUsuario);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nickname = $_POST['nickname'] ?? null;
            $email = $_POST['email'] ?? null;
            $bio = $_POST['bio'] ?? '';

            $senha = $_POST['senha'] ?? null;
            $confirmarSenha = $_POST['confirmar_senha'] ?? null;

            if (!is_null($senha) && !is_null($confirmarSenha) && $senha === $confirmarSenha) {
                Usuario::editarSenhaUsuario($idUsuario, $senha);
            }

            if (is_null($nickname) || is_null($email)) {
                header("Location: /php-twitter/usuario/editar/$idUsuario");
                exit;
            } 

            Usuario::editarUsuario($idUsuario, $nickname, $email, $bio);
            
            if  ($idUsuario == $_SESSION['id_usuario']) {
                header('Location: /php-twitter/usuario');
            } else {
                header('Location: /php-twitter/dashboard');
            }
        }

        include __DIR__ . '/../views/usuarios/editar-usuario.php';
    }

    public static function banirUsuario($idUsuario) {
        checarTipoUsuario('admin');
        Usuario::banirUsuario($idUsuario);
        
        header('Location: /php-twitter/dashboard');
    }

    public static function dashboard() {
        checarTipoUsuario(['admin', 'moderador']);

        $usuarios = Usuario::encontrarUsuarios();
        $topicos = Topico::encontrarTopicos();
        $posts = [];

        foreach ($topicos as $t) {
            $posts[$t['id_topico']] = Topico::encontrarPostsPorTopico($t['id_topico']);
        }

        include __DIR__ . '/../views/usuarios/dashboard.php';
    }

    public static function cadastro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nickname = $_POST['nickname'] ?? null;
            $email = $_POST['email'] ?? null;
            $senha = $_POST['password'] ?? null;
            $data_nascimento = $_POST['data_nascimento'] ?? null;
            $cpf = $_POST['cpf'] ?? null;

            if (is_null($nickname) || is_null($email) || is_null($senha) || is_null($data_nascimento) || is_null($cpf)) {
                header('Location: /php-twitter/cadastro');
            } else {
                Usuario::criarUsuario("normal", $nickname, $email, $senha, $data_nascimento, $cpf);
                header('Location: /php-twitter/login');
            }
        }

        include __DIR__ . '/../views/usuarios/cadastro.php';
    }

    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? null;
            $senha = $_POST['senha'] ?? null;
            
            if (is_null($email) || is_null($senha)) {
                header('Location: /php-twitter/login');
            }

            if (!Usuario::authenticate($email, $senha)) {
                header('Location: /php-twitter/login');
            }

            header('Location: /php-twitter');
        }

        include __DIR__ . '/../views/usuarios/login.php';
    }
    public static function logout() {
        logout();
        header('Location: /php-twitter');
    }

    public static function recuperarSenha() {
        $senhaRecuperada = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data_nascimento = date('Y-m-d', strtotime($_POST['data_nascimento'])) ?? null;
            $cpf = $_POST['cpf'] ?? null;


            if (is_null($data_nascimento) || is_null($cpf)) {
                header('Location: /php-twitter/recuperar-senha');
            }
            
            $verificarRecuperacao = Usuario::verificarRecuperarSenha($data_nascimento, $cpf);
            if ($verificarRecuperacao) {
                $senhaRecuperada = bin2hex(random_bytes(8)); 
                Usuario::editarSenhaUsuario($verificarRecuperacao['id_usuario'], $senhaRecuperada);
            }
        }
        include __DIR__ . '/../views/usuarios/recuperar-senha.php';
    }
}