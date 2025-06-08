<?php
require_once __DIR__ . '/../services/session.php';

require_once __DIR__ . '/../models/Post.php';

class PostController {
    public static function index() {
        $posts = Post::encontrarPostsRecentes();

        include __DIR__ . '/../views/posts/posts.php';
    }

    public static function explorar() {
        
    }

    public static function pesquisar() {
        $busca = $_GET['q'] ?? '';
        $posts = [];
        $usuarios = [];
        if ($busca) {
            $banco = Banco::getConn();
            // Busca posts
            $stmt = $banco->prepare("SELECT post.*, usuario.nickname FROM post INNER JOIN usuario ON post.id_usuario = usuario.id_usuario WHERE post.conteudo LIKE :busca ORDER BY data_postagem DESC");
            $stmt->execute([':busca' => "%$busca%"]);
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Busca usuários
            $stmt2 = $banco->prepare("SELECT id_usuario, nickname, bio FROM usuario WHERE nickname LIKE :busca OR bio LIKE :busca");
            $stmt2->execute([':busca' => "%$busca%"]);
            $usuarios = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}

        include __DIR__ . '/../views/posts/pesquisar.php';
    }

    public static function encontrarPost() {
        $posts = Post::encontrarPosts();

        include __DIR__ . '/../views/posts/posts.php';
    }

    public static function criarPost() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idUsuario = $_SESSION['id_usuario'] ?? null;
            $conteudo = $_POST['conteudo'] ?? null;
            $anexo = $_POST['anexo'] ?? '';

            Post::criarPost($idUsuario, $conteudo, $anexo);

            if (is_null($idUsuario) || is_null($conteudo)) {
                echo "<br> Erro ao postar, tente novamente";
            } else {
                header('Location: /php-twitter/');
            }
        }

        include __DIR__ . '/../views/posts/criar-post.php';
    }

    public static function editarPost($idPost) {
        $post = Post::encontrarPostPorId($idPost);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $conteudo = $_POST['conteudo'] ?? null;
            $anexo = $_POST['anexo'] ?? '';

            Post::editarPost($idPost, $conteudo, $anexo);

            if (is_null($idPost) || is_null($conteudo)) {
                echo "<br> Erro ao postar, tente novamente";
            } else {
                header("Location: /php-twitter/");
            }
        }

        include __DIR__ . '/../views/posts/editar-post.php';
    }

    public static function apagarPost($idPost) {
        Post::apagarPost($idPost);

        header('Location: /php-twitter/');
    }
}